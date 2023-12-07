<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

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

    function showComments() {
        $post = DB::table('posts')->get();

        return view('chat', ['posts' => $post]);
    }

    function showVersions() {
        $version = DB::table('versions')->get();

        return view('index', ['versions' => $version]);
    }

    function indexAction(Request $request)
    {
        //return response()->json(array('task' => $request));

        if ($request->ajax()) {
            $updating = DB::table('versions')
                ->where('id', $request->pk)
                ->update([
                    'text'=>$request->value
                ]);

            return response()->json(['success' => true]);
        }
        else return response('wrong');
    }

    function deleteVersion($id) {
        $delete = DB::table('versions')
            ->where('id', $id)
            ->delete();
        return redirect('index');
    }

    function editVersion($id){
        $row = DB::table('versions')
            ->where('id', $id)
            ->first();
        $data = [
            'Info' => $row,
        ];

        return view('editVersion', $data);
    }

    function updateVersion(Request $request) {
        $request->validate([
            'verzia'=>'required',
            'link'=>'required'
        ]);

        $updating = DB::table('versions')
            ->where('id', $request->input('cid'))
            ->update([
                'verzia'=>$request->input('verzia'),
                'link'=>$request->input('link')
            ]);
        return redirect('/');
       }

}
