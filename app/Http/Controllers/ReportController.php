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
        return view('admin.report');
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'customer_id' => "required|exists:customer,id",
            'producto' => "required|",
            'incidencia' =>"required|max:255",
            'observaciones' =>"required|max300",
            'fotos' =>"required|image",
            'estado' =>"required",
            'responsable' =>"required|exists:employees,id",
        ]);

        $picture = $request->file('fotos');
        $picture_file_name = $picture->getClientOriginalName();
        $picture->move(public_path('images/entradas'), $picture_file_name);

        $validated['fotos'] = "/images/entradas/" . $picture_file_name;
        $validated['slug'] = Str::slug("parte" . $validated['producto'] . time());

        $responsable = $request->input('responsable');
        $responsable->

        Report::create($validated);

        return view('admin.report');
    }

    public function show($slug)
    {
        $report = Report::where('slug', $slug)->get()->firstOrfail();
        return view('admin',["report" => $report]);
    }

    public function destroy(Request $request)
    {
        $customer = Report::findOrFail($request['id']);
        $customer->delete();
        return redirect('/app/report-list')->with('success','Parte eliminado');
    }

    public function list()
    {
        return view('admin.report',[ "reports" => Report::all()]);

    }
}
