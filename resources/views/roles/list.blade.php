@extends('layouts.app')
@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif
<div class="panel panel-default">
  <div class="panel-heading">
    Lista rolurilor
  </div>
  <div class="panel-body">
    <div class="form-group">
      <div class="pull-right">
        <a href="/roles/create" style="margin: 10px" class="btn btn-info">Adaugare Rol Nou</a>
      </div>
    </div>
    <table class="table table-bordered table-stripped">
      <tr>
        <th width="20">No</th>
        <th>Nume</th>
        <th width="300">Actiune</th>
      </tr>
      @if (count($roles) > 0)
      @foreach ($roles as $key => $role)
      <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $role->name }}</td>
        <td>
          <a class="btn btn-success" href="{{route('roles.show',$role->id) }}">Vizualizare</a>
          <a class="btn btn-primary" href="{{route('roles.edit',$role->id) }}">Modificare</a>
          {{ Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) }}
          {{ Form::submit('Stergere', ['class' => 'btn btn-danger']) }}
          {{ Form::close() }}
        </td>
      </tr>
      @endforeach
      @else
      <tr>
        <td colspan="4">Nu exista roluri!</td>
      </tr>
      @endif
    </table>
    <!-- Introduce nr pagina -->
    {{$roles->render()}}
  </div>
</div>
@endsection