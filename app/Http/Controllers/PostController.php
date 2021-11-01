<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Image;
use App\Models\Post;
use App\Models\Video;
use App\Rules\Uppercase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    //index
    public function index()
    {
        
        // $post = Post::find(13);
        // Mise  à jour
        // $post->update([
        //     'title' => 'Titre modifié'
        // ]);
        // Suppression
        // $post->delete();
        // dd('Supprimé');
        // $title = "Mon super titre";
        // $posts = [
        //     'Premier titre',
        //     'Second titre'
        // ];
        // $posts = Post::orderBy('title')->take(5)->get();
        // dd($posts);
        
        $posts = Post::all();
        $video = Video::find(1);
        return view('articles', compact('posts', 'video'));
        // return view('articles')->with('title', $title);
    }

    public function show($id)
    {
        // Renvoie erreur en cas d'erreur
        $post = Post::findOrFail($id);

        // Condition WHERE
        // $post = Post::where('title', '=', 'Eos rerum culpa non magni alias.')->first();
        // Laravel comprend sans la condition =
        // $post = Post::where('title', 'Eos rerum culpa non magni alias.')->firstOrFail();
        // dd($post);
        return view('article', [
            'post' => $post
        ]);
    }

    public function create()
    {
        return view('form');
    }

    public function store(Request $request)
    {
        // dd($request->avatar->store('avatars'));
        // Creation d'une instance de Post
        // $post = new Post();

        // $post->title = $request->title;
        // $post->content = $request->content;

        // Validation des données envoyées par le formulaire
        // $file = Storage::disk('local')->put('avatars', $request->avatar);
        $filename = 'image_'.time().'.'.$request->avatar->extension();

        $path = $request->file('avatar')->storeAs(
                    'avatars',
                    $filename,
                    'public'
                );

        // dd(Storage::path($filename));

        $request->validate([
            'title' => ['required', 'min:5', 'max:100', 'unique:posts', new Uppercase],
            'content' => ['required']
        ]);

        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content
        ]);

        $image = new Image();
        $image->path = $path;

        $post->image()->save($image);

        dd('Post créé');
        // Premier forme de recuperation des valeurs
        // : $request->champs
        // Second forme de recuperation
        // : $request->input('champs') Sinon aucun argument tout les champs
    }

    public function contact()
    {
        return view('contact');
    }

    public function register()
    {
        $post  = Post::find(11);
        $video = Video::find(1);

        $comment1 = new Comment(['content' => 'Mon premier commentaire']);
        $comment2 = new Comment(['content' => 'Mon deuxieme commentaire']);
        
        $post->comments()->saveMany([
            $comment1,
            $comment2
        ]);

        $comment3 = new Comment(['content' => 'Mon troixieme commentaire']);
        
        $video->comments()->save($comment3);
    }
}
