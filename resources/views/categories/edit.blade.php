@extends('layouts.master')
@section('content')
<div class="panel panel-default">
  <div class="panel-heading"> Modificare Nume Categorie</div>
  <div class="panel-body">
    <!-- exista inregistrari in tabelul task -->
    @if (count($errors)> 0)
    <div class="alert alert-danger">
      <strong>Eroare:</strong>
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif
    <!-- populez campurile formularului cu datele aferente din tabela task -->
    {!! Form::model($category, ['method' => 'PATCH','route' => ['categories.update', $category->id]]) !!}
    <div class="form-group">
      <label for="name">Nume</label>
      <input type="text" name="name" class="form-control" value="{{$category->name }}">
    </div>
    <div class="form-group">
      <input type="submit" value="Salvare Modificari" class="btn btn-info">
      <a href="{{route('categories.index') }}" class="btn btn-default">Cancel</a>
    </div>
    {!! Form::close() !!}
  </div>
</div>
@endsection