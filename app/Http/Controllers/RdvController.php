<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rdv;
use App\Models\Patient;
use App\Models\Medecin;
use Illuminate\Support\Facades\Log;

class RdvController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $rdvs = Rdv::join('patients', 'patients.id', '=', 'rdvs.patient_id')
      ->join('medecins', 'medecins.id', '=', 'rdvs.medecin_id')
      ->get([
        'rdvs.id',
        'rdvs.date',
        'rdvs.heure',
        'patients.prenom AS patient_prenom',
        'patients.nom AS patient_nom',
        'medecins.prenom AS medecin_prenom',
        'medecins.nom AS medecin_nom'
      ]);
    //dd($rdvs);
    return view('rdvs.index', compact('rdvs'));
  }


  /**,
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $patients = Patient::all();
    $medecins = Medecin::all();
    return view('rdvs.create', compact('patients', 'medecins'));
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

    $rdv = new Rdv([
      'date' => $request->get('date'),
      'heure' => $request->get('heure'),
      'patient_id' => $request->get('getPatient'),
      'medecin_id' => $request->get('getMedecin')
    ]);

    $rdv->save();
    return redirect('/rdvs')->with('success', 'Le rdv a été enregistré!');
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
    $rdv = Rdv::find($id);
    return view('rdvs.edit', compact('rdv', 'patients', 'medecins'));
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
      'heure' => 'required',
      'patient_id' => 'required',
      'medecin_id' => 'required'
    ]);
    $rdv = Rdv::find($id);
    $rdv->date = $request->get('date');
    $rdv->heure = $request->get('heure');
    $rdv->patient_id = $request->get('getPatient');
    $rdv->medecin_id = $request->get('getMedecin');


    $rdv->save();
    return redirect('/rdvs')->with('success', 'Le rdv a été modifié!');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $rdv = Rdv::find($id);
    $rdv->delete();
    return redirect('/rdvs')->with('success', 'Le rdv a été supprimé!');
  }
}