<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Author;

class PostController extends Controller
{

    public function index() {

      $posts = Post::all();
      // dd($posts);
      return response()->json($posts);

  }

    public function getAuthors() {

      $authors = Author::all();
      // dd($posts);
      return response()->json($authors);
  }
    public function getPostsByAuthor($id) {

      $posts = Post::all()->where('author_id', $id);
      // dd($posts);
      return response()->json($posts);
  }
  public function getPostBySlug($slug){
    $post = Post::where('slug', $slug )->first();
    // dd($post);
    return response()->json($post);
  }
}
