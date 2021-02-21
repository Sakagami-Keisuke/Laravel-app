<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// vendor/laravel/framework/src/Illuminate/Support/Facades
use Illuminate\Support\Facades\DB;
use App\Models\Test;

class TestController extends Controller
{
    public function index()
    {
        $values = Test::all();
        //dd($values);

        $tests = DB::table('tests')
        ->select('id')
        ->get();

        dd($tests);

        # /resources/views/tests/test.blade.php
        # http://127.0.0.1:8000/tests/test
        return view('tests.test', compact('values'));
    }
}
