@extends('layouts.app')
@section('content')
<div class="panel panel-default">
  <div class="panel-heading">Adaugă articol nou</div>
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
    {{ Form::open(array('route' => 'articles.store','method'=>'POST')) }}
    <div class="form-group mt-4">
      <label for="name">Titlu</label>
      <input type="text" name="title" class="form-control" value="{{old('name')}}">
    </div>
    <div class="form-group mt-4">
      <label for="description">Content</label>
      <textarea name="content" class="form-control" rows="3">{{old('content')}}</textarea>
    </div>
    <div class="form-group mt-4 w-25">
      <label for="category">Categorie</label>
      <select name="category_id" class="form-control">
        @foreach ($categories as $category)
        <option value="{{ $category['id'] }}" {{ old('category_id') == $category['id'] ? 'selected' : '' }}>
          {{ $category['name'] }}
        </option>
        @endforeach
      </select>
    </div>
    <div class="form-group mt-4 w-25">
      <input type="submit" value="Adauga Sarcina" class="btn btn-info">
      <a href="{{ route('articles.index') }}" class="btn btn-default">Cancel</a>
    </div>
    {{ Form::close() }}
  </div>
</div>
@endsection