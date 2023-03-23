<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consultation;
use App\Models\Patient;
use App\Models\Medecin;
use App\Models\Medicament;

class ConsultationController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $consultations = Consultation::join('patients', 'patients.id', '=', 'consultations.patient_id')
      ->join('medecins', 'medecins.id', '=', 'consultations.medecin_id')
      ->select(
        'consultations.id',
        'consultations.date',
        'consultations.heure',
        'consultations.discription',
        'patients.prenom AS patient_prenom',
        'patients.nom AS patient_nom',
        'medecins.prenom AS medecin_prenom',
        'medecins.nom AS medecin_nom'
      )->get();
    return view('consultations.index', compact('consultations'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $patients = Patient::all();
    $medecins = Medecin::all();
    return view('consultations.create', compact('patients', 'medecins'));
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
      'date' => 'required',
      'heure' => 'required'
    ]);

    $consultation = new Consultation([

      'patient_id' => $request->get('getPatient'),
      'medecin_id' => $request->get('getMedecin'),
      'date' => $request->get('date'),
      'heure' => $request->get('heure'),
      'discription' => $request->get('discription')

    ]);

    $consultation->save();
    return redirect('/consultations')->with('success', 'Le consultation a été enregistré!');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $patients = Patient::all();
    $medecins = Medecin::all();
    $consultation = Consultation::find($id);
    return view('consultations.edit', compact('consultation', 'patients', 'medecins'));
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
      'date' => 'required',
      'heure' => 'required'
    ]);
    $consultation = Consultation::find($id);
    $consultation->date = $request->get('date');
    $consultation->patient_id = $request->get('getPatient');
    $consultation->medecin_id = $request->get('getMedecin');
    $consultation->heure = $request->get('heure');
    $consultation->discription = $request->get('discription');
    $consultation->save();
    return redirect('/consultations')->with('success', 'Le consultation a été modifié!');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $consultation = Consultation::find($id);
    $consultation->delete();
    return redirect('/consultations')->with('success', 'Le consultation a été supprimé!');
  }
}
