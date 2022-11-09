<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use League\Flysystem\UrlGeneration\PublicUrlGenerator;

class ReportController extends Controller
{
    public function new_form()
    {
        return view('components.report.create');
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'customer_id' => "required|exists:customer,id",
            'producto' => "required|",
            'incidencia' =>"required|max:255",
            'observaciones' =>"required|max300",
            'fotos' =>"required|image",
            'responsable' =>"required|exists:employees,id",
        ]);

        $picture = $request->file('fotos');
        $picture_file_name = time() . $picture->getClientOriginalName();
        $picture->move(public_path('images/entradas'), $picture_file_name);

        $validated['fotos'] = "/images/entradas/" . $picture_file_name;
        $validated['slug'] = Str::slug($validated['id'] . time());

        Report::create($validated);

        return view('components.report.index');
    }

    public function show($slug)
    {
        $report = Report::where('slug', $slug)->get()->firstOrfail();
        return view('components.report.report',["report" => $report]);
    }

    public function destroy(Report $report)
    {
        $report->delete();
        return redirect()->view('components.report.index')
            ->with('succes', 'Parte eliminado correctamente');
    }

    public function list()
    {
        return view('components.report.index',[ "reports" => Report::all()]);

    }
}
