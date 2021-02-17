<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResourcesController extends Controller
{
    public function index($cate = null)
    {
        $query =  \App\Resource::where('category', $cate)->firstOrFail();
        $articles = $query->latest()->paginate(10);

        return view('resources.index', compact('articles'));

    }
}
