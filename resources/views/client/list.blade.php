@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-11">
                <h2>Cliente</h2>
        </div>
        <div class="col-lg-1">
            <a class="btn btn-success" href="{{ route('client.create') }}">Add</a>
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

    <form class="form-inline" method="GET">
      <div class="form-group col-md-6">
        <label for="filter" class="col-md-2 col-form-label">Filtro</label>
        <select name="cityFilter" id="cityFilter" class="form-control">
          @foreach($cities as $item)
            <option value="{{ $item->name }}">{{ $item->name }}</option>
          @endforeach
        </select>
      <button type="submit" class="btn btn-success col-md-2">Filter</button>

      </div>
    </form>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Ciudad</th>
            <th width="280px">Action</th>
        </tr>

        @foreach ($clients as $client)
            <tr>
                <td>{{ $client->id }}</td>                
                <td>{{ $client->cod }}</td>
                <td>{{ $client->name }}</td>
                <td>{{ $client->city }}</td>
                <td>
                    <form action="{{ route('client.destroy',$client->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('client.show',$client->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('client.edit',$client->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {{ $clients->withQueryString()->links() }}
</div>
@endsection