<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medecin;

class MedecinController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $medecins = Medecin::all();
    return view('medecins.index', compact('medecins'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('medecins.create');
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

    $medecin = new Medecin([
      'nom' => $request->get('nom'),
      'prenom' => $request->get('prenom'),
      'specialite' => $request->get('specialite'),
      'adresse' => $request->get('adresse'),
      'tel' => $request->get('tel')

    ]);
    $medecin->save();
    return redirect('/medecins')->with('success', 'Le medecin a été enregistré!');
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
    $medecin = Medecin::find($id);
    return view('medecins.edit', compact('medecin'));
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
    $medecin = Medecin::find($id);
    $medecin->nom = $request->get('nom');
    $medecin->prenom = $request->get('prenom');
    $medecin->specialite = $request->get('specialite');
    $medecin->adresse = $request->get('adresse');
    $medecin->tel = $request->get('tel');
    $medecin->save();
    return redirect('/medecins')->with('success', 'Le medecin a été modifié!');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $medecin = Medecin::find($id);
    $medecin->delete();
    return redirect('/medecins')->with('success', 'Le medecin a été supprimé!');
  }
}