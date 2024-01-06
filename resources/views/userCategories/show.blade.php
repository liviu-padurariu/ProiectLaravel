@extends('layouts.app')
@section('content')
<div class="panel panel-default">
  <div class="panel-heading">
    Vizualizare relatie intre autor si categorie
  </div>
  <div class="panel-body">
    <div class="pull-right">
      <a class="btn btn-default" href="{{ route('userCategories.index') }}">Inapoi</a>
    </div>
    <div class="form-group">
      <strong>Nume Autor: </strong> {{ $userCategory->user->name }}
    </div>
    <div class="form-group">
      <strong>Nume Categorie: </strong> {{ $userCategory->category->name }}
    </div>
  </div>
</div>
@endsection