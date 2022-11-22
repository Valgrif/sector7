<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

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
            'foto' =>$request->foto,
            'role' => 'Tecnico',
        ]);

        return redirect('/app/employee-list');
    }

    public function list()
    {
        return view('admin.employees',[ "users" => User::all()]);

    }

    public function edit(Request $request, User $user)
    {
        return view('admin.edit-employee', ['employee' => $user]);
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
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
            'foto' =>$request->foto,
            'role' => 'Tecnico',
        ]);

        return redirect('/app/employee-list');
    }

    public function destroy(Request $request)
    {
        $employee = User::findOrFail($request['id']);
        $employee->delete();
        return redirect('/app/employee-list')->with('success','Empleado eliminado');
    }


}
