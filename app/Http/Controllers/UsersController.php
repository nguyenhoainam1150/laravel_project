<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function index() {
        echo "Show all users";
    }

    public function countdown() {
        for ($i = 10; $i > 0 ; $i--) {
            echo $i . "</br>";
        }
    }

    public function checkConnection() {
        try {
            DB::connection()->getPdo();
            echo "DB connected";
        } catch (\Exception $e) {
            die("Could not connect to the database.  Please check your configuration. error:" . $e );
        }
    }

    public function checkMethod(Request $result) {
        echo $result->isMethod('get');
    }

    public function add() {
        echo "Add new user";
    }
}
