@extends('layouts.master')
@section('content')
<div class="panel panel-default">
  <div class="panel-heading">Adauga o categorie noua unui Jurnalist!</div>
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
    {{ Form::open(array('route' => 'userCategories.store','method'=>'POST')) }}
    <div class="form-group">
      <label for="user">Nume Autor</label>
      <select name="user_id" class="form-control">
        @foreach ($users as $user)
        <option value="{{ $user['id'] }}" {{ old('user_id') == $user['id'] ? 'selected' : '' }}>
          {{ $user['name'] }}
        </option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="category">Nume Categorie</label>
      <select name="category_id" class="form-control">
        @foreach ($categories as $category)
        <option value="{{ $category['id'] }}" {{ old('category_id') == $category['id'] ? 'selected' : '' }}>
          {{ $category['name'] }}
        </option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <input type="submit" value="Adauga" class="btn btn-info">
      <a href="{{ route('articles.index') }}" class="btn btn-default">Cancel</a>
    </div>
    {{ Form::close() }}
  </div>
</div>
@endsection