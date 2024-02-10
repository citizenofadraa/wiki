<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use Illuminate\Support\Facades\DB;

use App\Models\Article;
use App\Models\Posts;
use App\Models\User;
use App\Models\Version;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class LaravelCRUD
{

    function showPosts($id){
        $posts = DB::table('posts')
            ->where('idFora', $id)
            ->get();

        //return response()->json(array('task' => $posts));

        return view('chat', ['posts' => $posts]);
    }

    function addPost(Request $request){

        $request->validate([
            'pouzivatel'=>'required',
            'text'=>'required',
            'idFora'=>'required'
        ]);

        $post = new Posts();
        $post->pouzivatel = $request->input('pouzivatel');
        $post->text = $request->input('text');
        $post->idFora = $request->input('idFora');

        //return response()->json(array('task' => $article));

        $post->save();

        return redirect('/chat/'.$post->idFora);
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

    function addVersion(Request $request){

        $version = new Version();
        $version->verzia = $request->input('verzia');
        $version->link = $request->input('link');
        $vstup = $request->input('datum');
        $date = Carbon::parse($vstup);
        $version->datum = $date->format('y/m/d');

        //return response()->json(array('task' => $version));

        $version->save();

        return redirect('index');
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

    function deleteVersion($id) {
        $delete = DB::table('versions')
            ->where('id', $id)
            ->delete();
        return redirect('index');
    }

    function deleteForum($id) {
        $delete = DB::table('forums')
            ->where('id', $id)
            ->delete();
        return redirect(url('/forum/'));
    }

    function deletePost($id) {
        $delete = DB::table('posts')
            ->where('id', $id)
            ->delete();
        return redirect(url('/forum/'));
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
        return redirect('index');
       }

    function updateForums(Request $request, $id)
    {
        $forum = Forum::findorfail($id);
        $forum->update($request->all());

        return response()->json(['message' => 'Item updated successfully']);
    }
}
