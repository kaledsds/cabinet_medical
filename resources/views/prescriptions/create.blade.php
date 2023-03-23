@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col text-center">
      <h3>
        <font color="maroon"><b>Ajouter un prescription </b></font>
      </h3>
      @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div><br />
      @endif
    </div>
    <div>&nbsp;
    </div>
  </div>

  <div class="row">

    <div class="col">




      <form method="post" action="{{ route('prescriptions.store',['consultid'=>$consultid]) }}">
        @csrf
        <input type="hidden" name="cons_id" value="{{$consultid}}" />
        <div class="flex">
          <div class=" col-md-6">

            <div class="form-group">
              <label for="floatingSelect">Select Medicament :</label>
              <select name="medic" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                <option selected>Medecins</option>
                @foreach ($medicaments as $medicament)
                <option value="{{ $medicament->id }}">{{ $medicament->nom }}
                </option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="dure">Dure:</label>
              <input type="text" class="form-control" name="dure" />
            </div>
            <div class="form-group">
              <label for="dosage">Dosage:</label>
              <input type="text" class="form-control" name="dosage" />
            </div>
            <div class="card">
              <button type="submit" class="btn btn-primary">Ajouter le prescription</button>
            </div>

          </div>

        </div>
        <div>
          <script>
          </script>
        </div>

      </form>

    </div>

    <div class="col">



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


    </div>

  </div>
</div>
</div>

@endsection