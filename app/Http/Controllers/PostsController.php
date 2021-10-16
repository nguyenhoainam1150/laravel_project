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

    public function deletePosts(Request $req) {
        $req = $req->all();

        if (is_null($req['id'])) 
            return response(["code" => 0, "message" => "Posts not found!!!"]);

        $rs = Posts::find($req['id'])->delete();
        
        return $rs ? response(["code" => 1, "message" => "Delete posts successfully."]) : response(["code" => 0, "message" => "Delete posts failure."]);
    }

    public function editPosts(Request $req) {
        $req = $req->all();

        if (is_null($req['id'])) 
            return response(["code" => 0, "message" => "Posts not found!!!"]);

        $record = Posts::find($req['id']);

        if (is_null($record)) {
            return response(["code" => 0, "message" => "Posts not found!!!"]);
        } else {
            $record->title = $req['title'];
            $record->content = $req['content'];

            return $record->save() ? response(["code" => 1, "message" => "Update posts successfully."]) : response(["code" => 0, "message" => "Update posts failure."]);
        }
    }
}
