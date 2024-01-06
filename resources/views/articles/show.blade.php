@extends('layouts.master')
@section('content')
<div class="panel panel-default">
  <div class="panel-heading">
    Vizualizare Articol
  </div>
  <div class="panel-body">
    <div class="pull-right">
      <a class="btn btn-default" href="{{ route('welcome') }}">Inapoi</a>
    </div>
    <div class="form-group">
      <strong>Titlu: </strong> {{ $article->title }}
    </div>
    <div class="form-group">
      <strong>Descriere: </strong> {{ $article->content }}
    </div>
    <div class="form-group">
      <strong>Nume Autor: </strong> {{ $article->user->name }}
    </div>
    <div class="form-group">
      <strong>Nume Categorie: </strong> {{ $article->category->name }}
    </div>
    <div class="form-group">
      <strong>Data Trimiterii: </strong> {{ $article->submission_date }}
    </div>
    <div class="form-group">
      <strong>Status: </strong> {{ $article->is_approved ? 'Publicat' : 'Inca nu este publicat' }}
    </div>
  </div>
</div>
@endsection