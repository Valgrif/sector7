<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Customer;
use App\Models\Report;
use Illuminate\Support\Facades\Session;

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
            'mail' => "required|email|max:100",
            'telefono' => "required|max:9",
            'encargado' => "required|max:100",

        ]);

        $validated['slug'] = Str::slug($validated['cif']);

        Customer::create($validated);

        return redirect('/app/customer-list');
    }

    public function list(Request $request)
    {
        $textSearch=trim($request->get('searchFor'));
        $customers=Customer::query()
                    ->select()
                    ->where('nombre', 'LIKE', '%'.$textSearch.'%')
                    ->orWhere('cif', 'LIKE', '%'.$textSearch.'%')
                    ->orderby('nombre', 'asc')
                    ->paginate(10);

        return view('admin.customers', [
            "customers" => $customers,
        ]);
    }

    public function edit(Request $request, Customer $customer)
    {
        return view('admin.edit-customer', ['customer' => $customer]);
    }

    public function update(Request $request, Customer $customer)
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

        $customer->update($validated);

        return back()->with('message', 'Ficha de cliente editada correctamente');

    }

    public function destroy(Request $request)
    {
        $customer = Customer::findOrFail($request['id']);
        $customer->delete();
        return back();
    }

    public function show ($slug)
    {
        $customer = Customer::where('slug', $slug)->get()->firstOrFail();
        return view('admin.single-customer', [
            "customer" => $customer,
            "reports" => Report::all()->where('customer_id', '==', $customer['id'])
        ]);
    }
}

