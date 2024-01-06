@extends('layouts.app')
@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<div class="panel panel-default">
    <div class="panel-heading">
        Lista Articolelor
    </div>
    <div class="panel-body">
        @if (count($articles) > 0)
        <div class="list-group">
            @foreach ($articles as $key => $article)
            <div class="list-group-item" style="margin: 10px">
                <h4 class="list-group-item-heading" style="margin: 10px">{{ $article->title }}</h4>
                <p class="list-group-item-text" style="margin: 10px">{{ substr($article->content, 0, 100) }}...</p>
                <p class="list-group-item-text" style="margin: 10px"><strong>Categorie:</strong> {{ $article->category->name }}</p>
                <a class="btn btn-success" style="margin: 10px" href="{{ route('articles.show', $article->article_id) }}">Vizualizare Articol</a>
            </div>
            @endforeach
        </div>
        <!-- Introduce nr pagina -->
        {{ $articles->render() }}
        @else
        <p>Nu exista articole!</p>
        @endif
    </div>
</div>
@endsection