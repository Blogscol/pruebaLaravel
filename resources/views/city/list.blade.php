@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-11">
                <h2>Ciudades</h2>
        </div>
        <div class="col-lg-1">
            <a class="btn btn-success" href="{{ route('city.create') }}">Add</a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

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

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Codigo</th>
            <th>Nombre</th>
            <th width="280px">Action</th>
        </tr>

        @foreach ($cities as $city)
            <tr>
                <td>{{ $city->id }}</td>                
                <td>{{ $city->cod }}</td>
                <td>{{ $city->name }}</td>
                <td>
                    <form action="{{ route('city.destroy',$city->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('city.show',$city->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('city.edit',$city->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {{ $cities->links() }}
</div>
@endsection