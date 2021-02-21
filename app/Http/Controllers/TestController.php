<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;

class TestController extends Controller
{
    public function index()
    {
        $values = Test::all();
        //dd($values);

        $collection = collect([1, 2, 3, 4, 5, 6, 7]);
        $chunks = $collection->chunk(4);
        $chunks->toArray();
        // dd($chunks);



        # /resources/views/tests/test.blade.php
        # http://127.0.0.1:8000/tests/test
        return view('tests.test', compact('values'));
    }
}
