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
      <strong>Titlu: </strong> {{ $article->title }}
    </div>
    <div class="form-group">
      <strong>Descriere: </strong> {{ $article->content }}
    </div>
    <div class="form-group">
      <strong>User ID: </strong> {{ $article->user_id }}
    </div>
    <div class="form-group">
      <strong>Category ID: </strong> {{ $article->category_id }}
    </div>
    <div class="form-group">
      <strong>Submission Date: </strong> {{ $article->submission_date }}
    </div>
    <div class="form-group">
      <strong>Approved: </strong> {{ $article->is_approved }}
    </div>
  </div>
</div>
@endsection