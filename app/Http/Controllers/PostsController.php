<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;

class PostsController extends Controller
{
    //
    public function index() {
        $ls_posts = Posts::all();
        
        return count($ls_posts) > 0 ? response(["code" => 1, "data" => $ls_posts]) : [];
    }

    public function addPosts(Request $req) {
        $req = $req->all();

        $posts = new Posts();
        $posts->title = $req['title'];
        $posts->content = $req['content'];
        $posts->status = 1;

        $rs = $posts->save();
        return $rs ? response(["code" => 1, "data" => $posts]) : response(["code" => 0]);
    }
}
