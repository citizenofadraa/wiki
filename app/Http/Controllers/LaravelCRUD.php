<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use Illuminate\Support\Facades\DB;

use App\Models\Article;
use App\Models\Posts;
use App\Models\User;
use App\Models\Version;
use Illuminate\Http\Request;

class LaravelCRUD
{

    function showPosts($id){
        $row = DB::table('posts')
            ->where('idFora', $id)
            ->first();
        $data = [
            'Info' => $row,
        ];

        return view('edit', $data);
    }

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

    function addForum(Request $request){

        $request->validate([
            'idAutora'=>'required',
            'nazov'=>'required',
        ]);

        $forum = new Forum();
        $forum->idAutora = $request->input('idAutora');
        $forum->nazov = $request->input('nazov');

        //return response()->json(array('task' => $forum));

        $forum->save();

        return redirect('forum');
    }

    function showComments() {
        $post = DB::table('posts')->get();

        return view('chat', ['posts' => $post]);
    }

    function showForum() {
        $forum = DB::table('forums')->get();

        return view('forum', ['forums' => $forum]);
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
