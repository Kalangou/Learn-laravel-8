@extends('layouts.app')

@section('content')
    <h1>Liste des articles</h1>
    <ul>
        @foreach($posts as $post)
            <li><a href="#">{{ $post }}</a></li>
        @endforeach
    </ul>
@endsection