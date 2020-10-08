@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-11">
            <h2>Editar Ciudad</h2>
        </div>
        <div class="col-lg-1">
            <a class="btn btn-primary" href="{{ url('city') }}"> Back</a>
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
    <form method="post" action="{{ route('city.update',$city->id) }}" >
        @method('PATCH')
        @csrf
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" class="form-control" id="name" placeholder="Nombre de la Ciudad" name="name" value="{{ $city->name }}">
        </div>
        <div class="form-group">
            <label for="cod">Codigo:</label>
            <input type="text" class="form-control" id="cod" placeholder="Codigo" name="cod" value="{{ $city->cod }}">
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>
@endsection