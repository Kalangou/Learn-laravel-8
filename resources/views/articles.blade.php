@extends('layouts.app')

@section('content')
    <h1><b>Liste des articles</b></h1>
    <ul>
        @if ($posts->count() > 0)
            @foreach($posts as $post)
                <li><a href="{{ route('posts.show', ['id' => $post->id]) }}">{{ $post->title }}</a></li>
            @endforeach
        @else
            <span>Aucun poste en base de données</span>
        @endif
    </ul>

    <hr>

    {{-- <h1><b>Liste des vidéos</b></h1>

    @forelse ( $video->comments as $comment )
        <div>{{ $comment->content }} | Créé le {{ $comment->created_at->format('d/m/Y') }}</div>
    @empty
        <span>Aucun commentaire pour cette vidéo</span>
    @endforelse --}}

@endsection