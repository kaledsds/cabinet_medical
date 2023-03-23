<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicament;


class MedicamentController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $medicaments = Medicament::all();
    return view('medicaments.index', compact('medicaments'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('medicaments.create');
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
      'code' => 'required'
    ]);

    $medicament = new Medicament([
      'nom' => $request->get('nom'),
      'code' => $request->get('code'),
      'famille' => $request->get('famille'),
      'forme' => $request->get('forme')

    ]);
    $medicament->save();
    return redirect('/medicaments')->with('success', 'Le medicament a été enregistré!');
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
    $medicament = Medicament::find($id);
    return view('medicaments.edit', compact('medicament'));
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
      'code' => 'required'
    ]);
    $medicament = Medicament::find($id);
    $medicament->nom = $request->get('nom');
    $medicament->code = $request->get('code');
    $medicament->famille = $request->get('famille');
    $medicament->forme = $request->get('forme');
    $medicament->save();
    return redirect('/medicaments')->with('success', 'Le medicament a été modifié!');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $medicament = Medicament::find($id);
    $medicament->delete();
    return redirect('/medicaments')->with('success', 'Le medicament a été supprimé!');
  }
}