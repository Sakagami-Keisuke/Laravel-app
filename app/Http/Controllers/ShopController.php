<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Area;

class ShopController extends Controller
{
    public function index()
    {
        //主 -> 従
        $area_tokyo = Area::find(1)->shops;

        $shop = Shop::find(1)->area->name;
        dd($shop);
    }
}
