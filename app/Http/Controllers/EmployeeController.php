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
            'nombre' => "required|max:255",
            'apellidos' => "required|max:255",
            'dni' => "required|max:9",
            'direccion' => "required|max:255",
            'email' => "required|max:255",
            'telefono' => "required|numeric|max:12",
            'foto' => "required|image",
        ]);

        $picture = $request->file('foto');

        $picture_fie_name = time() . $picture->getClientOriginalName();
        $picture->move(public_path('images'), $picture_fie_name);

        $validated['foto'] = "/images/profile/" . $picture_fie_name;
        $validated['slug'] = Str::slug($validated['dni']);
        Employee::create($validated);

        return redirect('/app/employee-list');

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

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->view('admin.employees')
            ->with('succes', 'Empleado eliminado correctamente');
    }

    public function list(){
        return view('admin.employees', ["employees" => Employee::all()]);
    }
}
