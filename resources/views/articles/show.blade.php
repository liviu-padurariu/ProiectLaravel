@extends('layouts.master')
@section('content')
<div class="panel panel-default">
  <div class="panel-heading">
    View Task
  </div>
  <div class="panel-body">
    <div class="pull-right">
      <a class="btn btn-default" href="{{ route('articles.index') }}">Inapoi</a>
    </div>
    <div class="form-group">
      <strong>Nume: </strong> {{ $article->title }}
    </div>
    <div class="form-group">
      <strong>Descriere: </strong> {{ $article->content }}
    </div>
  </div>
</div>
@endsection