@extends('layouts.app')

@section('content')
    <h1>{{ $post->content }}</h1>

    {{-- <span>{{ $post->image ? $post->im  age->path : "Pas d'image" }}</span> --}}
    <img src="{{ Storage::url($post->image->path) }}" alt="">
    <hr>
    @forelse ( $post->comments as $comment )
        <div>{{ $comment->content }} | Créé le {{ $comment->created_at->format('d/m/Y') }}</div>
    @empty
        <span>Aucun commentaire pour ce poste</span>
    @endforelse
    <hr>
    @forelse ($post->tags as $tag)
        <span>{{ $tag->name }}</span>
    @empty
        <span>Aucun tag pour ce poste</span>
    @endforelse
    <hr>

    {{-- <span>Nom de l'artiste de l'image : {{ $post->imageArtist ? $post->imageArtist->name : "Aucun artiste" }}</span> --}}

    <span>Commentaire le plus récent : {{ $post->latestComment ? $post->latestComment->content : "Aucun" }}</span>
    <br>
    <span>Commentaire le plus ancien : {{ $post->latestComment ? $post->oldestComment->content : "Aucun" }}</span>


@endsection