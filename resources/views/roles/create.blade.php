@extends('layouts.master')
@section('content')
<div class="panel panel-default">
  <div class="panel-heading">Adaugă Rol Nou Pentru User</div>
  <div class="panel-body">
    @if (count($errors) > 0)
    <div class="alert alert-danger">
      <strong>Errors:</strong>
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif
    {{ Form::open(array('route' => 'roles.store','method'=>'POST')) }}
    <div class="form-group">
      <label for="name">Numele noului rol:</label>
      <input type="text" name="name" class="form-control" value="{{old('name') }}">
    </div>
    <div class="form-group">
      <input type="submit" value="Adauga Rol Nou" class="btn btn-info">
      <a href="{{ route('roles.index') }}" class="btn btn-default">Cancel</a>
    </div>
    {{ Form::close() }}
  </div>
</div>
@endsection