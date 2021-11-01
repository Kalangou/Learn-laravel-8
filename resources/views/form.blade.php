@extends('layouts.app')
@section('content')
    <h2>Création d'un nouveau poste</h2>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="text-red-500">{{ $error }}</div>
        @endforeach
    @endif
    <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
        @csrf
        <input type="text" name="title" class="border-gray-600 border-2 block my-2" placeholder="Titre">
        <textarea name="content" class="border-gray-600 border-2  block my-2" cols="30" rows="10" placeholder="Contenu"></textarea>
        <label for="avatar">Choose a profile picture:</label>

        <input type="file" id="avatar" name="avatar" accept="image/png, image/jpeg" class="block my-2">
        <button type="submit" class="bg-green-500">Créer</button>
    </form>
@endsection