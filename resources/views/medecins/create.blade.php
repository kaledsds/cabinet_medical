@extends('layouts.app')

@section('content')
<div class="row" style="width:600px;">
  <div class="col-md-12">
    <h4>
      <font color="orange"><b>Ajouter un medecin </b></font>
    </h4>
    <div>
      @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div><br />
      @endif
      <form method="post" action="{{ route('medecins.store') }}">
        @csrf

        <div class="row">
          <div class="col-md-6 ">
            <div class="form-group">
              <label for="client">Nom:</label>
              <input type="text" class="form-control" name="nom" />
            </div>
            <div class="form-group">
              <label for="client">Prenom:</label>
              <input type="text" class="form-control" name="prenom" />
            </div>
            <div class="form-group">
              <label for="ville">Specialite:</label>
              <input type="text" class="form-control" name="specialite" />
            </div>
          </div>
          <div class="col-md-6 ">
            <div class="form-group">
              <label for="edresse">Adresse:</label>
              <input type="text" class="form-control" name="adresse" />
            </div>
            <div class="form-group">
              <label for="tel">Tel:</label>
              <input type="text" class="form-control" name="tel" />
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <button type="submit" class="btn btn-primary">Ajouter le medecin</button>
            </div>
          </div>
        </div>

      </form>
    </div>
  </div>
</div>
@endsection
