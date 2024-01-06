@extends('layouts.master')
@section('content')
<div class="panel panel-default">
  <div class="panel-heading">
    View Task
  </div>
  <div class="panel-body">
    <div class="pull-right">
      <a class="btn btn-default" href="{{ route('userCategories.index') }}">Inapoi</a>
    </div>
    <div class="form-group">
      <strong>User ID: </strong> {{ $userCategory->user_id }}
    </div>
    <div class="form-group">
      <strong>Category ID: </strong> {{ $userCategory->category_id }}
    </div>
  </div>
</div>
@endsection