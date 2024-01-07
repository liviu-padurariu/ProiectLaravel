@extends('layouts.app')
@section('content')
<div class="panel panel-default">
  <div class="panel-heading">Modificare Informatii Articol</div>
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
    <div class="form-group mt-4">
      <label for="user">Nume autor: </label>
      <span style="font-weight: bolder; font-size: large">{{ $user->name }}</span>
    </div>
    <div class="form-group mt-4">
      <label for="name">Titlu</label>
      <input type="text" name="title" class="form-control" value="{{$article->title }}">
    </div>
    <div class="form-group mt-4">
      <label for="description">Descriere</label>
      <textarea name="content" class="form-control" rows="3">{{ $article->content }}</textarea>
    </div>
    <div class="form-group mt-4 w-25">
      <label for="category">Nume Categorie</label>
      <select name="category_id" class="form-control">
        @foreach ($categories as $category)
        <option value="{{ $category['id'] }}" {{ $article->category_id == $category['id'] ? 'selected' : '' }}>
          {{ $category['name'] }}
        </option>
        @endforeach
      </select>
    </div>
    <div class="form-group mt-4 w-25">
      <label for="name">Data Trimiterii</label>
      <input readonly type="text" name="submission_date" class="form-control" value="{{$article->submission_date }}">
    </div>
    <div class="form-group mt-4 w-25">
      <label for="name">Status</label>
      @if(auth()->user()->isEditor())
          <select name="is_approved" class="form-control">
              <option value="1" {{ $article->is_approved ? 'selected' : '' }}>Publicat</option>
              <option value="0" {{ !$article->is_approved ? 'selected' : '' }}>Inca nu este publicat</option>
          </select>
      @else
          <input type="text" class="form-control" value="{{ $article->is_approved ? 'Publicat' : 'Inca nu este publicat' }}" readonly>
      @endif
  </div>  
    <div class="form-group mt-4">
      <input type="submit" value="Salvare Modificari" class="btn btn-info">
      <a href="{{route('articles.index') }}" class="btn btn-default">Cancel</a>
    </div>
    {!! Form::close() !!}
  </div>
</div>
@endsection