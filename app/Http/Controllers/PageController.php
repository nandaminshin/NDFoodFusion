<?php

namespace App\Http\Controllers;

use App\Models\Recipe;

class PageController extends Controller
{
    public function home()
    {
        $featured_recipes = Recipe::with(['user', 'category'])
            ->latest()
            ->take(4)
            ->get();

        return view('home', compact('featured_recipes'));
    }

    public function about()
    {
        return view('about');
    }

    public function recipes()
    {
        return view('recipes');
    }


    public function contact()
    {
        return view('contact');
    }

    public function culinary()
    {
        return view('culinary');
    }

    public function education()
    {
        return view('education');
    }

    public function dashboard()
    {
        return view('dashboard');
    }
}