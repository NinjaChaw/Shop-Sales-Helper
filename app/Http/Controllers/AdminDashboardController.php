<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index() {

        $categories = Category::all();

        return view('admin.dashboard', compact('categories'));
    }
}
