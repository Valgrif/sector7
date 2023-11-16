<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Report;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.employees');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'apellidos' => ['required', 'string', 'max:255'],
            'direccion' => ['required', 'string', 'max:255'],
            'telefono' => ['required', 'string', 'min:9', 'max:9'],
            'dni' => ['required', 'string', 'min:9', 'max:9'],
            'foto' => ['required', 'image'],

        ]);

        $picture = $request->file('foto');
        $picture_file_name = $picture->getClientOriginalName();
        $picture->move(public_path('images/profile'), $picture_file_name);

        $validated['foto'] = "/images/profile/" . $picture_file_name;

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'apellidos' => $request->apellidos,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'dni' => $request->dni,
            'foto' =>"/images/profile/" . $picture_file_name,
            'role' => 'Tecnico',
        ]);

        return back()->with('message', 'Empleado nuevo registrado correctamente');
    }

    public function list()
    {
        return view('admin.employees',[ "users" => User::all()]);

    }

    public function edit($id)
    {
        $user = User::where('id', $id)->get()->firstOrFail();
        return view('admin.edit-employee', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $user = User::where('id', $id)->get()->firstOrFail();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($id)],
            'apellidos' => ['required', 'string', 'max:255'],
            'direccion' => ['required', 'string', 'max:255'],
            'telefono' => ['required', 'string', 'min:9', 'max:9'],
            'dni' => ['required', 'string', 'min:9', 'max:9'],
            'foto' => ['image'],

        ]);

        if ($request->hasFile('foto')) {
            $picture = $request->file('foto');

            if ($picture->isValid()) {
                $picture_file_name = $picture->getClientOriginalName();
                $picture->move(public_path('images/profile'), $picture_file_name);
                $validated['foto'] = "/images/profile/" . $picture_file_name;
            } else {
                return back()->with('error', 'Error al subir la imagen.');
            }
        }

        $user->update($validated);

        return back()->with('message', 'Ficha de empleado editada correctamente');
    }

    public function destroy(Request $request)
    {
        $employee = User::findOrFail($request['id']);
        $employee->delete();
        return redirect('/app/employee-list');
    }

    public function show ($dni)
    {
        $employee = User::where('dni', $dni)->get()->firstOrFail();
        return view('admin.single-employee', [
            "employee" => $employee,
            "reports" => Report::all()->where('responsable', '==', $employee['id'])
        ]);
    }


}
