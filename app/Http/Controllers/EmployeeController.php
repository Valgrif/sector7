<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class EmployeeController extends Controller
{


    public function create(Request $request)
    {
        $validated = $request->validate([
            'name' => "required|max:255",
            'apellidos' => "required|max255",
            'dni' => "required|max9",
            'direccion' => "required|max255",
            'email' => "required|max255",
            'telefono' => "required|numeric|max12",
            'foto' => "required|image",
        ]);

        $picture = $request->file('foto');

        $picture_fie_name = time() . $picture->getClientOriginalName();
        $picture->move(public_path('images'), $picture_fie_name);

        $validated['foto'] = "/images/" . $picture_fie_name;
        $validated['slug'] = Str::slug($validated['nombre'] . time());
        Employee::create($validated);

        return view('components.employee.index');

    }

    public function show($slug)
    {
        $product = Employee::where('slug', $slug)->get()->firstOrFail();
        $related_products = $product->category->products
            ->where('id', '!=', $product->id)
            ->take(3);

        return view('public.single-product', [
            "product" => $product,
            "related_products" => $related_products,
        ]);
    }

    public function edit(Employee $employee)
    {
        //
    }

    public function update(Request $request, Employee $employee)
    {

    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->view('components.employee.index')
            ->with('succes', 'Empleado eliminado correctamente');
    }

    public function list(){
        return view('components.employee.index', ["employees" => Employee::all()]);
    }
}
