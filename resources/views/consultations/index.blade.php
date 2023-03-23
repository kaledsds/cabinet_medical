@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-12">
    <h4>
      <font color="orange"><b>Gestion des consultations</b></font>
    </h4>
  </div>
  <div class="col-sm-12">
    <p>
      <a style="margin: 19px;" href="{{ route('consultations.create')}}" class="btn btn-primary"><b>Ajouter un nouveau
          consultation</b></a>
    </p>
  </div>
  <div class="col-md-12">
    <div style="display:block;position:relative;height:300px;overflow:auto;">
      <table class="table table-hover table-condensed ">
        <thead>
          <tr>
            <th style="background-color:orange;">
              <font color="white"><b>ID consultation</b></font>
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
          @foreach($consultations as $consultation)
          <tr>
            <td style="vertical-align:middle;">{{$consultation->id}}</td>
            <td style="vertical-align:middle;">{{$consultation->patient_nom}} {{$consultation->patient_prenom}}</td>
            <td style="vertical-align:middle;">{{$consultation->medecin_nom}} {{$consultation->medecin_prenom}}</td>
            <td style="vertical-align:middle;">{{$consultation->heure}}</td>
            <td style="vertical-align:middle;">{{$consultation->date}}</td>
            <td style="vertical-align:middle;">
              <div class="btn-group">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" data-bs-auto-close="inside" aria-expanded="false">
                  <i class="bi bi-gear"></i>
                </button>
                <ul class="dropdown-menu">
                  <li><button class="dropdown-item" type=" button" data-bs-toggle="collapse" data-bs-target="#collapseExample_{{ $consultation->id }}" aria-expanded="false">Discription
                      <i class="bi bi-clipboard-pulse"></i></button></li>
                  <li><a href="{{ route('consultations.edit',$consultation->id)}}" class="dropdown-item">Edit <i class='far fa-edit'></i>
                    </a></li>
                  <li><a href="{{ route('prescriptions.create',['consult'=>$consultation->id])}}" class="dropdown-item">Prescription
                      <i class="bi bi-prescription2"></i></a></li>
                  <li>
                    <form action="{{ route('consultations.destroy', $consultation->id)}}" method="post">
                      @csrf
                      @method('DELETE')
                      <button class="dropdown-item" type="submit">Delete <i class="bi bi-trash3"></i></button>
                    </form>
                  </li>
                </ul>
              </div>

          </tr>
          <tr class="collapse" id="collapseExample_{{ $consultation->id }}">
            <td colspan="8">
              <div class="collapse" id="collapseExample_{{ $consultation->id }}">
                <div class="card card-body">{{$consultation->discription}}</div>
              </div>
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