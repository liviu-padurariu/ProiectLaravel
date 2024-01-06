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
        <a href="/articles/create" style="margin: 10px" class="btn btn-info">Adaugare Article Noua</a>
      </div>
    </div>
    <table class="table table-bordered table-stripped">
      <tr>
        <th width="20">No</th>
        <th>Titlu</th>
        <th>Content</th>
        <th>User ID</th>
        <th>Category ID</th>
        <th>Submission Date</th>
        <th>Approved</th>
        <th width="300">Actiune</th>
      </tr>
      @if (count($articles) > 0)
      @foreach ($articles as $key => $article)
      <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $article->title }}</td>
        <td>{{ $article->content }}</td>
        <td>{{ $article->user_id }}</td>
        <td>{{ $article->category_id }}</td>
        <td>{{ $article->submission_date }}</td>
        <td>{{ $article->is_approved }}</td>
        <td>
          <a class="btn btn-success" href="{{route('articles.show',$article->article_id) }}">Vizualizare</a>
          <a class="btn btn-primary" href="{{route('articles.edit',$article->article_id) }}">Modificare</a>
          {{ Form::open(['method' => 'DELETE','route' => ['articles.destroy', $article->article_id],'style'=>'display:inline']) }}
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
    {{$articles->render()}}
  </div>
</div>
@endsection