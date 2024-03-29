<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            'numeroDeSerie' => "required | max:120",
            'producto' => "required",
            'incidencia' =>"required|max:255",
            'observaciones' =>"required|max:300",
            'fotos' =>"image",
            'estado' =>"required",
            'responsable' =>"required|exists:users,id",
        ]);

        if ($request['fotos'] != null)
        {
            $picture = $request->file('fotos');
            $picture_file_name = $picture->getClientOriginalName();
            $picture->move(public_path('images/entradas'), $picture_file_name);
            $validated['fotos'] = "/images/entradas/" . $picture_file_name;

        }


        $validated['slug'] = Str::slug($validated['numeroDeSerie']);

        Report::create($validated);

        return redirect('/app/report-list');
    }

    public function list(Request $request)
    {
        $textSearch=trim($request->get('searchFor'));
        $reports=Report::query()
            ->select()
            ->where('numeroDeSerie', 'like', '%'.$textSearch.'%')
            ->orderby('id', 'asc')
            ->paginate(10);

        return view('admin.report',[
            "reports" => $reports,
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

    public function edit($slug)
    {
        $report = Report::where('slug', $slug)->firstOrFail();
        return view('admin.edit-report', [
            'report' => $report,
            "employees" => User::all(),
            "customers" => Customer::all(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'customer_id' => "required|exists:customers,id",
            'numeroDeSerie' => "required | max:120",
            'producto' => "required",
            'incidencia' =>"required|max:255",
            'observaciones' =>"required|max:300",
            'estado' =>"required",
            'responsable' =>"required|exists:users,id",
            'reparacion' => "max:1000",
        ]);

        $validated['slug'] = Str::slug($validated['numeroDeSerie']);

        if ($request['fotos'] != null)
        {
            $picture = $request->file('fotos');
            $picture_file_name = $picture->getClientOriginalName();
            $picture->move(public_path('images/entradas'), $picture_file_name);
            $validated['fotos'] = "/images/entradas/" . $picture_file_name;

        }

        $report = Report::where('id', $id)->get()->firstOrFail();
        $report->update($validated);

        return back()->with('message', 'Parte de entrada editado correctamente');

    }

    public function repair(Request $request, $slug)
    {
        $validated = $request->validate([
            'estado' => "max:500",
            'reparacion' => "required",
        ]);

        $report = Report::where('slug', $slug)->firstOrFail();
        $report->update($validated);

        return back()->with('message', 'Parte actualizado correctamente');


    }

    public function show ($slug)
    {
        $report = Report::where('slug', $slug)->firstOrFail();
        $employee = User::where('id', $report['responsable'])->firstOrFail();
        $customer = Customer::where('id', $report['customer_id'])->firstOrFail();
        return view('admin.single-report', [
            "report" => $report,
            "employee" => $employee,
            "customer" => $customer,
        ]);
    }

}
