<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function new_form()
    {
        return view('components.customer.create');
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'nombre' => "required|max:255",
            'direccion' => "required|max:255",
            'cif' => "required|max:9",
            'mail' => "required|max:100",
            'telefono' => "required|max:9",
            'encargado' => "required|max:100",

        ]);

        $validated['slug'] = Str::slug($validated['cif']);

        Customer::create($validated);

        //return dd($customer);

        return redirect (route('list-customer'));
    }

    public function show($slug)
    {
        $customer = Customer::where('slug', $slug)->get()->firstOrfail();
        return view('components.customer.customer', ["customer"=>$customer]);
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->view('components.customer.list')
            ->with('succes', 'Cliente eliminado correctamente');
    }

    public function list()
    {
        return view('components.customer.list', ["customers" => Customer::all()]);
    }
}
