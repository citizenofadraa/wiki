<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Posts;
use App\Models\User;
use App\Models\Version;
use Illuminate\Http\Request;

class LaravelCRUD
{

    function addPost(Request $request){

        $request->validate([
            'pouzivatel'=>'required',
            'text'=>'required',
        ]);

        $post = new Posts();
        $post->pouzivatel = $request->input('pouzivatel');
        $post->text = $request->input('text');

        //return response()->json(array('task' => $article));

        $post->save();

        return redirect('chat');
    }

}
