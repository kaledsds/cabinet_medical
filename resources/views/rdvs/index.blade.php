@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-12">
    <h4>
      <font color="orange"><b>Gestion des rdvs</b></font>
    </h4>
  </div>
  <div class="col-md-12">
    <a style="margin: 19px;" href="{{ route('rdvs.create')}}" class="btn btn-primary"><b>Ajouter un nouveau
        rdv</b></a>
  </div>
  <div class="col-md-12">
    <div style="display:block;position:relative;height:300px;overflow:auto;">
      <table class="table table-hover table-condensed ">
        <thead>
          <tr>
            <th style="background-color:orange;">
              <font color="white"><b>ID rdv</b></font>
            </th>
            <th style="background-color:orange;">
              <font color="white"><b>Patient</b></font>
            </th>
            <th style="background-color:orange;">
              <font color="white"><b>Médecin</b></font>
            </th>
            <th style="background-color:orange;">
              <font color="white"><b>heure</b></font>
            </th>
            <th style="background-color:orange;">
              <font color="white"><b>Date</b></font>
            </th>
            <th style="background-color:orange;text-align:center;" colspan="4">
              <font color="white"><b>Actions</b></font>
            </th>
          </tr>
        </thead>
        <tbody>
          @foreach($rdvs as $rdv)
          <tr>
            <td style="vertical-align:middle;">{{$rdv->id}}</td>
            <td style="vertical-align:middle;">{{$rdv->patient_nom}} {{$rdv->patient_prenom}}</td>
            <td style="vertical-align:middle;">{{$rdv->medecin_nom}} {{$rdv->medecin_prenom}}</td>
            <td style="vertical-align:middle;">{{$rdv->heure}}</td>
            <td style="vertical-align:middle;">{{$rdv->date}}</td>
            <td colspan="2"></td>
            <td>
              <a href="{{ route('rdvs.edit',$rdv->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
              <form action="{{ route('rdvs.destroy', $rdv->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">X</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div>
    </div>
    <div class="col-sm-12">
      @if(session()->get('success'))
      <div class="alert alert-success">
        {{ session()->get('success') }}
      </div>
      @endif
    </div>

    @endsection
