@extends('layouts.master')
@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif
<div class="panel panel-default">
  <div class="panel-heading">
    Lista sarcinilor
  </div>
  <div class="panel-body">
    <div class="form-group">
      <div class="pull-right">
        <a href="/roles/create" style="margin: 10px" class="btn btn-info">Adaugare Sarcina Noua</a>
      </div>
    </div>
    <table class="table table-bordered table-stripped">
      <tr>
        <th width="20">No</th>
        <th>User ID</th>
        <th>Category ID</th>
        <th width="300">Actiune</th>
      </tr>
      @if (count($userCategories) > 0)
      @foreach ($userCategories as $key => $userCategory)
      <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $userCategory->user_id }}</td>
        <td>{{ $userCategory->category_id }}</td>
        <td>
          <a class="btn btn-success" href="{{route('userCategories.show',$userCategory->id) }}">Vizualizare</a>
          <a class="btn btn-primary" href="{{route('userCategories.edit',$userCategory->id) }}">Modificare</a>
          {{ Form::open(['method' => 'DELETE','route' => ['userCategories.destroy', $userCategory->id],'style'=>'display:inline']) }}
          {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
          {{ Form::close() }}
        </td>
      </tr>
      @endforeach
      @else
      <tr>
        <td colspan="4">Nu exista sarcini!</td>
      </tr>
      @endif
    </table>
    <!-- Introduce nr pagina -->
    {{$userCategories->render()}}
  </div>
</div>
@endsection