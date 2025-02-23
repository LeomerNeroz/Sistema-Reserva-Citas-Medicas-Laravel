<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\SecurityQuestion;

class UsuarioController extends Controller
{
    public function __construct() {
        $this->middleware('permission:admin.usuarios.index')->only('index');
        $this->middleware('permission:admin.usuarios.create')->only('create', 'store');
        $this->middleware('permission:admin.usuarios.edit')->only('edit', 'update');
        $this->middleware('permission:admin.usuarios.destroy')->only('destroy');
    }

    public function index() {
        $usuarios = User::all();
        return view('admin.usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        $roles = ['secretaria', 'admin']; 
        return view('admin.usuarios.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:250',
            'email' => 'required|max:250|unique:users',
            'password' => 'required|max:250|confirmed',
            'rol' => 'required', 
        ]);

        $usuario = new User();
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->password);
        $usuario->save();

        
        $usuario->assignRole($request->rol);

        return redirect()->route('admin.usuarios.preguntas')
            ->with('mensaje', 'se registró el usuario de manera correcta')
            ->with('icono', 'success');
    }

   

    public function show($id) {
        $usuario = User::findOrFail($id);
        return view('admin.usuarios.show', compact('usuario'));
    }

    public function edit($id)
    {
        $usuario = User::findOrFail($id);
        $roles = ['secretaria', 'admin']; 
        $rolActual = $usuario->roles->pluck('name')->first(); 

        return view('admin.usuarios.edit', compact('usuario', 'roles', 'rolActual'));
    }

    public function update(Request $request, $id)
    {
        $usuario = User::find($id);

        $request->validate([
            'name' => 'required|max:250',
            'email' => 'required|max:250|unique:users,email,' . $usuario->id,
            'password' => 'nullable|max:250|confirmed',
        ]);

        $usuario->name = $request->name;
        $usuario->email = $request->email;

        if ($request->filled('password')) {
            $usuario->password = Hash::make($request->password);
        }

        
        if ($request->filled('rol')) {
            $usuario->syncRoles([$request->rol]); 
        }

        $usuario->save();

        return redirect()->route('admin.usuarios.index')
            ->with('mensaje', 'Se actualizó al usuario de manera correcta')
            ->with('icono', 'success');
    }

    public function ConfirmDelete($id) {
        $usuario = User::findOrFail($id);
        return view('admin.usuarios.delete', compact('usuario'));
    }

    public function destroy($id) {
        User::destroy($id);
        return redirect()->route('admin.usuarios.index')
            ->with('mensaje', 'Se eliminó al usuario de la manera correcta')
            ->with('icono', 'success');
    }
}
