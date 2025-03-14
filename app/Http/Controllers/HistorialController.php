<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Historial;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use TCPDF;

class HistorialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $historiales = Historial::all(); 
        return view('admin.historial.index', compact('historiales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pacientes = Paciente::orderBy('apellidos', 'asc')->get();
        $doctores = Doctor::orderBy('nombres', 'asc')->get();
        return view('admin.historial.create', compact('pacientes', 'doctores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'detalle' => 'required|string',
            'fecha_visita' => 'required|date',
            'paciente_id' => 'required|integer',
            'doctor_id' => 'required|integer|exists:doctors,id',
        ]);

        $historial = new Historial();

        $historial->detalle = $request->detalle;
        $historial->fecha_visita = $request->fecha_visita;
        $historial->paciente_id = $request->paciente_id;
        $historial->doctor_id = $request->doctor_id;

        $historial->save();

        return redirect('/admin/historial')->with('success', 'Historial creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Historial  $historial
     * @return \Illuminate\Http\Response
     */
    public function show($id)
{
    $historial = Historial::find($id);
    
    if (!$historial) {
        return redirect()->route('admin.historial.index')
            ->with('mensaje', 'Historial no encontrado')
            ->with('icono', 'error');
    }

    return view('admin.historial.show', compact('historial'));
}


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Historial  $historial
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $historial = Historial::find($id);
        $pacientes = Paciente::orderBy('apellidos', 'asc')->get();
        $doctores = Doctor::orderBy('nombres', 'asc')->get();
        return view('admin.historial.edit', compact('historial' , 'pacientes' , 'doctores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Historial  $historial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $historial = Historial::find($id);

        $historial->detalle = $request->detalle;
        $historial->fecha_visita = $request->fecha_visita;
        $historial->paciente_id = $request->paciente_id;
        $historial->doctor_id = $request->doctor_id;

        $historial->save();

        return redirect('/admin/historial')
            ->with('mensaje', 'Historial Actualizado exitosamente')
            ->with('icono', 'success');
    }

    public function confirmDelete($id)
    {
        $historial = Historial::find($id);
        return view('admin.historial.delete', compact('historial'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Historial  $historial
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $historial = Historial::findOrFail($id);
        $historial->delete();

        return redirect()->route('admin.historial.index')
            ->with('mensaje', 'Se eliminó el historial de la manera correcta')
            ->with('icono', 'success');

    }



    public function buscar_paciente(Request $request)
{
    $ci = $request->ci;
    $paciente = null;
    $pacientesSinCedula = Paciente::whereNull('ci')->get(); 

    if (!empty($ci)) {
        $paciente = Paciente::where('ci', $ci)->first();
    }
    return view('admin.historial.buscar_paciente', compact('paciente', 'pacientesSinCedula'));
}
public function imprimir_historial($id)
{
   
    $paciente = Paciente::find($id);
    $historiales = Historial::where('paciente_id', $id)->get();

    
    ob_clean();
    
   
    $pdf = new TCPDF();
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Centro de Salud San Judas Tadeo');
    $pdf->SetTitle('Historial Médico');
    $pdf->SetSubject('Historial de paciente');

    
    $pdf->AddPage();

    
    $img_file = public_path('dist/img/logo sjt.png');
    $x_pos = 150; 
    $y_pos = 15;  
    $width = 25;  
    $height = '';

   
    $pdf->SetXY(10, 12);

    $pdf->Image($img_file, $x_pos, $y_pos, $width, $height, '', '', '', false, 300, '', false, false, 1, false, false, false);

   
    $html = view('admin.historial.imprimir_historial', compact('historiales', 'paciente'))->render();

   
    $pdf->writeHTML($html, true, false, true, false, '');

   
    return $pdf->Output('historial_paciente_' . $id . '.pdf', 'I');
}






   
    public function pdf($id)
    {
       
        ob_clean();
        
        $doctores = Doctor::all();
        $historial = Historial::find($id);
        $html = view('admin.historial.pdf', compact('historial'))->render();

       
        $pdf = new MYPDF();
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Tu Nombre');
        $pdf->SetTitle('Listado de Historiales');
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

      
        return $pdf->Output('historial.pdf', 'I'); 
    }
}


class MYPDF extends TCPDF {

    
    public function Footer() {
       
        $this->SetY(-15);
        
        $this->SetFont('helvetica', 'I', 8);
        
        $this->Cell(0, 10, 'Página ' . $this->getAliasNumPage() . ' de ' . $this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
        
        $this->Cell(0, 10, 'Impreso por: ' . Auth::user()->email . ' | Fecha: ' . \Carbon\Carbon::now()->format('d/m/Y'), 0, false, 'R', 0, '', 0, false, 'T', 'M');
    }



    





    


}
