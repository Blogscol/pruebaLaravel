@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-11">
            <h2>Editar Cliente</h2>
        </div>
        <div class="col-lg-1">
            <a class="btn btn-primary" href="{{ url('client') }}"> Back</a>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post" action="{{ route('client.update',$client->id) }}" >
        @method('PATCH')
        @csrf
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" class="form-control" id="name" placeholder="Nombre del cliente" name="name" value="{{ $client->name }}">
        </div>
        <div class="form-group">
            <label for="city">Ciudad:</label>
            <input type="text" class="form-control" id="city" placeholder="Ciudad" name="city" value="{{ $client->city }}">
        </div>
        <div class="form-group">
            <label for="cod">Codigo:</label>
            <input type="text" class="form-control" id="cod" placeholder="Codigo" name="cod" value="{{ $client->cod }}">
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>
@endsection