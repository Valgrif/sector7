<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ReportController extends Controller
{
    public function new_form()
    {
        return view('admin.report', [
            "employees" => User::all(),
            "customers" => Customer::all(),
        ]);
    }

    public function create(Request $request)
    {

        $validated = $request->validate([
            'customer_id' => "required|exists:customers,id",
            'producto' => "required|",
            'incidencia' =>"required|max:255",
            'observaciones' =>"required|max:300",
            'fotos' =>"image",
            'estado' =>"required",
            'responsable' =>"required|exists:users,id",
        ]);

        $picture = $request->file('fotos');
        $picture_file_name = $picture->getClientOriginalName();
        $picture->move(public_path('images/entradas'), $picture_file_name);

        $validated['fotos'] = "/images/entradas/" . $picture_file_name;
        $validated['slug'] = Str::slug($validated['producto']);

        Report::create($validated);

        return redirect('/app/report-list');
    }

    public function list()
    {
        return view('admin.report',[
            "reports" => Report::all(),
            "employees" => User::all(),
            "customers" => Customer::all(),
        ]);

    }

    public function destroy(Request $request)
    {
        $report = Report::findOrFail($request['id']);
        $report->delete();
        return redirect('app/report-list');
    }

    public function edit(Request $request, Report $report)
    {
        return view('admin.edit-report', ['report' => $report]);
    }

    public function update(Request $request, Report $report)
    {
        $validated = $request->validate([
            'customer_id' => "required|exists:customers,id",
            'producto' => "required|",
            'incidencia' =>"required|max:255",
            'observaciones' =>"required|max:300",
            'estado' =>"required",
            'responsable' =>"required|exists:users,id",
        ]);

        $report->update($validated);

        return redirect('/app/report-list');

    }

    public function show ($slug)
    {
        $report = Report::where('slug', $slug)->get()->firstOrFail();
        return view('admin.single-report', ["report" => $report]);
    }

}
