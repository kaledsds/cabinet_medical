<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use Illuminate\Http\Request;
use App\Models\Prescription;
use App\Models\Medicament;

class PrescriptionController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create(Request $request)
  {
    $consultid = $request->query('consult');
    $medicaments = Medicament::all();
    $prescriptions = Prescription::join('consultations', 'consultations.id', '=', 'prescriptions.consultation_id')
      ->join('medicaments', 'prescriptions.medicament_id', '=', 'medicaments.id')
      ->select(
        'prescriptions.id',
        'medicaments.nom as medic',
        'prescriptions.duree',
        'prescriptions.dosage',
        'prescriptions.medicament_id as medicament_id ',
        'prescriptions.consultation_id',
      )
      ->get();
    return view('prescriptions.create', compact('consultid','medicaments','prescriptions'));
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
      'dure' => 'required',
      'dosage' => 'required'
    ]);

    $prescription = new Prescription([
      'duree' => $request->get('dure'),
      'dosage' => $request->get('dosage'),
      //'consultation_id' => $request->query('consultid'),
      'consultation_id' => $request->get('cons_id'),
      'medicament_id' => $request->get('medic')

    ]);
    $prescription->save();
    return redirect('/prescriptions')->with('success', 'Le prescription a été enregistré!');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show()
  {
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $prescription = Prescription::find($id);
    return view('prescriptions.edit', compact('prescription'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $request->validate([
      'dure' => 'required',
      'dosage' => 'required'
    ]);
    $prescription = Prescription::find($id);
    $prescription->dure = $request->get('dure');
    $prescription->dosage = $request->get('dosage');
    $prescription->medicament_id = $request->get('medic');
    $prescription->consultation_id = $request->get('cons');
    return redirect('/prescriptions')->with('success', 'Le prescription a été modifié!');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $prescription = Prescription::find($id);
    $prescription->delete();
    return redirect('/prescriptions')->with('success', 'Le prescription a été supprimé!');
  }
}
