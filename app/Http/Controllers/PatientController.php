<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class PatientController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $patients = Patient::all();
    return view('patients.index', compact('patients'));
  }


  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('patients.create');
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
      'nom' => 'required',
      'prenom' => 'required'
    ]);

    $patient = new Patient([
      'nom' => $request->get('nom'),
      'prenom' => $request->get('prenom'),
      'datenais' => $request->get('datenais'),
      'adresse' => $request->get('adresse'),
      'email' => $request->get('email'),
      'tel' => $request->get('tel')

    ]);
    $patient->save();
    return redirect('/patients')->with('success', 'Le patient a été enregistré!');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
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
    $patient = Patient::find($id);
    return view('patients.edit', compact('patient'));
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
      'nom' => 'required',
      'prenom' => 'required'
    ]);
    $patient = Patient::find($id);
    $patient->nom = $request->get('nom');
    $patient->prenom = $request->get('prenom');
    $patient->datenais = $request->get('datenais');
    $patient->adresse = $request->get('adresse');
    $patient->email = $request->get('email');
    $patient->tel = $request->get('tel');
    $patient->save();
    return redirect('/patients')->with('success', 'Le patient a été modifié!');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $patient = Patient::find($id);
    $patient->delete();
    return redirect('/patients')->with('success', 'Le patient a été supprimé!');
  }
}