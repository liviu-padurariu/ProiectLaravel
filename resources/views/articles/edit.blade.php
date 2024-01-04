@extends('layouts.master')
@section('content')
<div class="panel panel-default">
  <div class="panel-heading"> Modificare informatii Sarcina</div>
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
    {!! Form::model($task, ['method' => 'PATCH','route' => ['articles.update', $task->id]]) !!}
    <div class="form-group">
      <label for="name">Nume</label>
      <input type="text" name="name" class="form-control" value="{{$task->name }}">
    </div>
    <div class="form-group">
      <label for="description">Descriere</label>
      <textarea name="description" class="form-control" rows="3">{{ $task->description }}</textarea>
    </div>
    <div class="form-group">
      <input type="submit" value="Salvare Modificari" class="btn btn-info">
      <a href="{{route('articles.index') }}" class="btn btndefault">Cancel</a>
    </div>
    {!! Form::close() !!}
  </div>
</div>
@endsection