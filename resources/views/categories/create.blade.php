@extends('layouts.app')
@section('content')
<div class="panel panel-default">
  <div class="panel-heading">Adaugă O Categorie Noua Pentru Jurnalisti</div>
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
    {{ Form::open(array('route' => 'categories.store','method'=>'POST')) }}
    <div class="form-group">
      <label for="name">Numele categoriei:</label>
      <input type="text" name="name" class="form-control" value="{{old('name') }}">
    </div>
    <div class="form-group">
      <input type="submit" value="Adauga Categorie Noua" class="btn btn-info">
      <a href="{{ route('categories.index') }}" class="btn btn-default">Cancel</a>
    </div>
    {{ Form::close() }}
  </div>
</div>
@endsection