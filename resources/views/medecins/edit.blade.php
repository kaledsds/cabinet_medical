@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-12">
    <div style="width:800px;">
      <h4>
        <font color="orange"><b>Modification d'un Medecin </b></font>
      </h4>
    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    <br />
    @endif
    <div class="row">
      <div class="col-12">
        <form name="medecin" method="post" action="{{ route('medecins.update', $medecin->id) }}">
          @method('PATCH')
          @csrf

          <div class="card">

            <div class="row">
              <div class="col-md-6 ">
                <div class="form-group">
                  <label for="nom">Nom:</label>
                  <input type="text" class="form-control" name="nom" value="{{ $medecin->nom }}" />
                </div>
                <div class="form-group">
                  <label for="nom">Prenom:</label>
                  <input type="text" class="form-control" name="prenom" value="{{ $medecin->prenom }}" />
                </div>
                <div class="form-group">
                  <label for="ville">Specialite:</label>
                  <input type="text" class="form-control" name="specialite" value="{{ $medecin->specialite }}" />
                </div>

              </div>
              <div class="col-md-6 ">

                <div class="form-group">
                  <label for="adresse">Adresse:</label>
                  <input type="text" class="form-control" name="adresse" value="{{ $medecin->adresse }}" />
                </div>


                <div class="form-group">
                  <label for="tel">Tel:</label>
                  <table>
                    <tr>
                      <td><input type="text" class="form-control" name="tel" value="{{ $medecin->tel }}" /></td>
                      <td>&nbsp;</td>
                      <td>
                        <button type="submit" class="btn btn-primary">Modification du Medecin</button>
                      </td>
                    </tr>
                  </table>
                </div>





              </div>
            </div>

          </div>
        </form>
      </div>
    </div>

    @endsection
