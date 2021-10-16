<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function getCSRFToken(Request $req) {
        $token = $req->session()->token();

        $token = csrf_token();
    }
}
