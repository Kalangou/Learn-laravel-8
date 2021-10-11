<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //index
    public function index()
    {
        $title = "Mon super titre";
        $posts = [
            'Premier titre',
            'Second titre'
        ];

        return view('articles', compact('posts'));
        // return view('articles')->with('title', $title);
    }

    public function show($id)
    {
        $posts = [
            1 => 'Titre N°1',
            2 => 'Titre N°2'
        ];

        $post = $posts[$id] ?? 'Aucun titre trouvés.';

        return view('article', [
            'post' => $post
        ]);
    }

    public function contact()
    {
        return view('contact');
    }
}
