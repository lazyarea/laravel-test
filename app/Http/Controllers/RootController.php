<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Libs\Util;

class RootController extends Controller
{
    // /index
    public function getIndex()
    {
        return view('index');
    }

    public function postIndex(Request $req)
    {
        $json = [];
        $json = json_decode( (string) $req->input('json') );
        Util::xyz_curl();
        $text = Util::getText($url = "http://example.com", $method = "GET", $cssSelector = "body");
        logger($text);
        return view('index');
    }
}
