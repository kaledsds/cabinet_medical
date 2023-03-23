@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-12">
    <div style="width:800px;">
      <h4>
        <font color="orange"><b>Modification d'un medicament </b></font>
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
        <form name="fmedicament" method="post" action="{{ route('medicaments.update', $medicament->id) }}">
          @method('PATCH')
          @csrf

          <div class="card">

            <div class="row">
              <div class="col-md-6 ">
                <div class="form-group">
                  <label for="nom">Nom:</label>
                  <input type="text" class="form-control" name="nom" value="{{ $medicament->nom }}" />
                </div>
                <div class="form-group">
                  <label for="nom">Code:</label>
                  <input type="text" class="form-control" name="code" value="{{ $medicament->code }}" />
                </div>
                <div class="form-group">
                  <label for="ville">Famille:</label>
                  <input type="text" class="form-control" name="famille" value="{{ $medicament->famille }}" />
                </div>

              </div>
              <div class="col-md-6 ">

                <div class="form-group">
                  <label for="tel">Form:</label>
                  <table>
                    <tr>
                      <td><input type="text" class="form-control" name="forme" value="{{ $medicament->forme }}" /></td>
                      <td>&nbsp;</td>
                      <td>
                        <button type="submit" class="btn btn-primary">Modification du medicament</button>
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
