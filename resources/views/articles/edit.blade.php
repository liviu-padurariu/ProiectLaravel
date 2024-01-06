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
    {!! Form::model($article, ['method' => 'PATCH','route' => ['articles.update', $article->article_id]]) !!}
    <div class="form-group">
      <label for="name">Nume</label>
      <input type="text" name="title" class="form-control" value="{{$article->title }}">
    </div>
    <div class="form-group">
      <label for="description">Descriere</label>
      <textarea name="content" class="form-control" rows="3">{{ $article->content }}</textarea>
    </div>
    <div class="form-group">
      <label for="user">User</label>
      <select name="user_id" class="form-control">
        @foreach ($users as $user)
        <option value="{{ $user['id'] }}" {{ $article->user_id == $user['id'] ? 'selected' : '' }}>
          {{ $user['name'] }}
        </option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="category">Categorie</label>
      <select name="category_id" class="form-control">
        @foreach ($categories as $category)
        <option value="{{ $category['id'] }}" {{ $article->category_id == $category['id'] ? 'selected' : '' }}>
          {{ $category['name'] }}
        </option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="name">Submission Date</label>
      <input readonly type="text" name="submission_date" class="form-control" value="{{$article->submission_date }}">
    </div>
    <div class="form-group">
      <label for="name">Approved</label>
      <input readonly type="text" name="is_approved" class="form-control" value="{{$article->is_approved }}">
    </div>
    <div class="form-group">
      <input type="submit" value="Salvare Modificari" class="btn btn-info">
      <a href="{{route('articles.index') }}" class="btn btndefault">Cancel</a>
    </div>
    {!! Form::close() !!}
  </div>
</div>
@endsection