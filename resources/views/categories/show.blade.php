@extends('layouts.app')
@section('content')
<div class="panel panel-default">
  <div class="panel-heading">
    Vizualizare Rol
  </div>
  <div class="panel-body">
    <div class="pull-right">
      <a class="btn btn-default" href="{{ route('categories.index') }}">Inapoi</a>
    </div>
    <div class="form-group">
      <strong>Nume: </strong> {{ $category->name }}
    </div>
  </div>
</div>
@endsection