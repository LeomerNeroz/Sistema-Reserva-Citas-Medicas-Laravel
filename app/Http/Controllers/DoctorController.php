<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use TCPDF;



class DoctorController extends Controller
{
    public function index()
    {
        $doctores = Doctor::all();
        return view('admin.doctores.index', compact('doctores'));
    }

    public function create()
    {
        return view('admin.doctores.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'telefono' => 'required',
            'email' => 'required|max:250|unique:doctors',
            'especialidad' => 'required',
        ]);

        $doctor = new Doctor();
        $doctor->nombres = $request->nombres;
        $doctor->apellidos = $request->apellidos;
        $doctor->telefono = $request->telefono;
        $doctor->email = $request->email;
        $doctor->especialidad = $request->especialidad;
        $doctor->save();

        return redirect()->route('admin.doctores.index')
            ->with('mensaje', 'Se registró al doctor de la manera correcta')
            ->with('icono', 'success');
    }

    public function show($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('admin.doctores.show', compact('doctor'));
    }

    public function edit($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('admin.doctores.edit', compact('doctor'));
    }

    public function update(Request $request, $id)
    {
        $doctor = Doctor::find($id);

        $request->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'telefono' => 'required',
            'email' => 'required|max:250|unique:doctors,email,' . $doctor->id, 
            'especialidad' => 'required',
        ]);

        $doctor->nombres = $request->nombres;
        $doctor->apellidos = $request->apellidos;
        $doctor->telefono = $request->telefono;
        $doctor->email = $request->email;
        $doctor->especialidad = $request->especialidad;
        $doctor->save();

        return redirect()->route('admin.doctores.index')
            ->with('mensaje', 'Se actualizó al doctor de la manera correcta')
            ->with('icono', 'success');
    }

    public function confirmDelete($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('admin.doctores.delete', compact('doctor'));
    }

    public function destroy($id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();

        return redirect()->route('admin.doctores.index')
            ->with('mensaje', 'Se eliminó al doctor de la manera correcta')
            ->with('icono', 'success');
    }

    public function reportes(){
        return view('admin.doctores.reportes');
    }

    public function pdf()
{
    
    ob_clean();
    
    $doctores = Doctor::all();
    $html = view('admin.doctores.pdf', compact('doctores'))->render();

    
    $pdf = new TCPDF();
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Tu Nombre');
    $pdf->SetTitle('Listado de Doctores');
    $pdf->SetSubject('PDF con TCPDF');

    
    $pdf->AddPage();

   
    $img_file = 'dist/img/logo sjt.png';
    $x_pos = 150;
    $y_pos = 15;  
    $width = 25;  
    $height = '';

    $pdf->Image($img_file, $x_pos, $y_pos, $width, $height, '', '', '', false, 300, '', false, false, 1, false, false, false);

    
    $pdf->SetXY(10, 12);

    
    $pdf->writeHTML($html, true, false, true, false, '');

    
    return $pdf->Output('doctores.pdf', 'I'); 
}

    
    
}
