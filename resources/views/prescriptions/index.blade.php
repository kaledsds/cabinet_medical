@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-12">
    <h4>
      <font color="orange"><b>Gestion des prescriptions</b></font>
    </h4>
  </div>
  <div class="col-md-12">
    <a style="margin: 19px;" href="{{ route('prescriptions.create')}}" class="btn btn-primary"><b>Ajouter un nouveau
        prescription</b></a>
  </div>
  <div class="col-md-12">
    <div style="display:block;position:relative;height:300px;overflow:auto;">
      <table class="table table-hover table-condensed ">
        <thead>
          <tr>
            <th style="background-color:orange;">
              <font color="white"><b>ID prescription</b></font>
            </th>
            <th style="background-color:orange;">
              <font color="white"><b>ID consultation</b></font>
            </th>
            <th style="background-color:orange;">
              <font color="white"><b>dure</b></font>
            </th>
            <th style="background-color:orange;">
              <font color="white"><b>dosage</b></font>
            </th>
            <th style="background-color:orange;">
              <font color="white"><b>medicament</b></font>
            </th>
            <th style="background-color:orange;text-align:center;" colspan="4">
              <font color="white"><b>Actions</b></font>
            </th>

          </tr>
        </thead>

        <tbody>
          @foreach($prescriptions as $prescription)
          <tr>
            <td style="vertical-align:middle;">{{$prescription->id}}</td>
            <td style="vertical-align:middle;">{{$prescription->consultation_id}}</td>
            <td style="vertical-align:middle;">{{$prescription->duree}}</td>
            <td style="vertical-align:middle;">{{$prescription->dosage}}</td>
            <td style="vertical-align:middle;">{{$prescription->medic}}</td>
            <td colspan="2"></td>
            <td>
              <a href="{{ route('prescriptions.edit',$prescription->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
              <form action="{{ route('prescriptions.destroy', $prescription->id)}}" method="post">
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
