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
            'cif' => "required|min:9|max:9",
            'mail' => "required|max:100",
            'telefono' => "required|max:9",
            'encargado' => "required|max:100",

        ]);

        $validated['slug'] = Str::slug($validated['cif']);

        Customer::create($validated);


        //return dd($customer);

        //return redirect (route('list-customer'));
        return redirect('/app/customer-list');
    }

    public function show($slug)
    {
        $customer = Customer::where('slug', $slug)->get()->firstOrfail();
        return view('components.customer.customer', ["customer"=>$customer]);
    }

    public function delete(Request $request)
    {
        $id = $request->input('customer_id');
        $customer = Customer::findOrFail($id);
        if($customer->user == auth()->user()){
            $customer->delete();
        }
        return redirect('/app/customer-list')->with('success', 'Cliente eliminado correctamente');
    }

    public function list()
    {
        //return view('components.customer.list', ["customers" => Customer::all()]);
        return view('admin.customers', ["customers" => Customer::all()]);
    }
}
