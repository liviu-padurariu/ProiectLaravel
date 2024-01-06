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
    {!! Form::model($userCategory, ['method' => 'PATCH','route' => ['userCategories.update', $userCategory->id]]) !!}
    <div class="form-group">
      <label for="name">User ID</label>
      <input type="text" name="user_id" class="form-control" value="{{ $userCategory->user_id }}">
    </div>
    <div class="form-group">
      <label for="description">Category ID</label>
      <input type="text" name="category_id" class="form-control" value="{{ $userCategory->category_id }}">
    </div>
    <div class="form-group">
      <input type="submit" value="Salvare Modificari" class="btn btn-info">
      <a href="{{route('userCategories.index') }}" class="btn btn-default">Cancel</a>
    </div>
    {!! Form::close() !!}
  </div>
</div>
@endsection