@extends('layouts.master')
@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif
<div class="panel panel-default">
  <div class="panel-heading">
    Lista rolurilor
  </div>
  <div class="panel-body">
    <div class="form-group">
      <div class="pull-right">
        <a href="/categories/create" style="margin: 10px" class="btn btn-info">Adaugare Categorie Noua</a>
      </div>
    </div>
    <table class="table table-bordered table-stripped">
      <tr>
        <th width="20">No</th>
        <th>Nume</th>
        <th width="300">Actiune</th>
      </tr>
      @if (count($categories) > 0)
      @foreach ($categories as $key => $category)
      <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $category->name }}</td>
        <td>
          <a class="btn btn-success" href="{{route('categories.show',$category->id) }}">Vizualizare</a>
          <a class="btn btn-primary" href="{{route('categories.edit',$category->id) }}">Modificare</a>
          {{ Form::open(['method' => 'DELETE','route' => ['categories.destroy', $category->id],'style'=>'display:inline']) }}
          {{ Form::submit('Stergere', ['class' => 'btn btn-danger']) }}
          {{ Form::close() }}
        </td>
      </tr>
      @endforeach
      @else
      <tr>
        <td colspan="4">Nu exista roluri!</td>
      </tr>
      @endif
    </table>
    <!-- Introduce nr pagina -->
    {{$categories->render()}}
  </div>
</div>
@endsection