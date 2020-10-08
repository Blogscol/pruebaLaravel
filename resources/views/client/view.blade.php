@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-11">
                <h2>Vista Cliente</h2>
        </div>
        <div class="col-lg-1">
            <a class="btn btn-primary" href="{{ url('client') }}"> Back</a>
        </div>
    </div>
    <table class="table table-bordered">
        <tr>
            <th>Nombre:</th>
            <td>{{ $client->name }}</td>
        </tr>
        <tr>
            <th>Ciudad:</th>
            <td>{{ $client->city }}</td>
        </tr>
        <tr>
            <th>Codigo:</th>
            <td>{{ $client->cod }}</td>
        </tr>

    </table>
</div>
@endsection