<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $fields =  $request->validate([
            'name'=>'required',
            'text'=>'required'
        ]);
        $post = Post::create($fields);

        return ['post'=>$post];
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return ['post'=>$post];

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $fields =  $request->validate([
            'name'=>'required',
            'text'=>'required'
        ]);
        $post = update($fields);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)

    {
  $post = delete();
  return 'deleted';
    }
}
