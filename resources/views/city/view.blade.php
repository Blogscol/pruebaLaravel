@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-11">
                <h2>Vista Ciudades</h2>
        </div>
        <div class="col-lg-1">
            <a class="btn btn-primary" href="{{ url('city') }}"> Back</a>
        </div>
    </div>
    <table class="table table-bordered">
        <tr>
            <th>Nombre:</th>
            <td>{{ $city->name }}</td>
        </tr>
        <tr>
            <th>Codigo:</th>
            <td>{{ $city->cod }}</td>
        </tr>

    </table>
</div>
@endsection