<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return "Category OK";
    }

    public function create()
    {
        return "Create Category";
    }

    public function store(Request $request)
    {
        return "Store Category";
    }
}