<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    # /resources/views/tests/test.blade.php
    # http://127.0.0.1:8000/tests/test
    public function index(){
        return view('tests.test');
    }
}
