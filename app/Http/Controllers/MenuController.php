<?php

namespace App\Http\Controllers;

use App\Models\Category;

class MenuController extends Controller
{
    public function index()
    {
        $categories = Category::with('products')->get();

        return view('frontend.menu', compact('categories'));
    }
}