@extends('layouts.app')

@section('content')
<div class="row" style="width:600px;">
  <div class="col-md-12">
    <h4>
      <font color="orange"><b>Ajouter un rdv </b></font>
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
      <form method="post" action="{{ route('rdvs.store') }}">
        @csrf
        <div class="row">
          <div class="col-md-6 ">
            <div class="form-group">
              <label for="floatingSelect">Select Medecins :</label>
              <select name="getMedecin" class="form-select" id="floatingSelect"
                aria-label="Floating label select example">
                <option selected>Open Medecins menu</option>
                @foreach ($medecins as $medecin)
                <option value="{{ $medecin->id }}">{{ $medecin->prenom }} {{ $medecin->nom }}
                </option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="floatingSelect">Select Patient :</label>
              <select name="getPatient" class="form-select" id="floatingSelect"
                aria-label="Floating label select example">
                <option selected>Open patient menu</option>
                @foreach ($patients as $patient)
                <option value="{{ $patient->id }}">{{ $patient->prenom }} {{ $patient->nom }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="date">Date:</label>
              <input type="text" class="form-control" name="date" />
            </div>
            <div class="form-group">
              <label for="heure">heure:</label>
              <input type="text" class="form-control" name="heure" />
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <button type="submit" class="btn btn-primary">Ajouter le rdv</button>
                </div>
              </div>
            </div>
            <script>
            </script>
      </form>
    </div>
  </div>
</div>










































@endsection