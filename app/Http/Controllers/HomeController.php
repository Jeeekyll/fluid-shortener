<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    public function store(Request $request)
    {
        $faker = \Faker\Factory::create();

        $request->validate([
            'original_link' => 'required|url'
        ]);
        $shortLink = 'short-link.com/' . $faker->safeColorName . $faker->buildingNumber;

        $data = [
            'original_link' => $request->original_link,
            'user_ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'short_link' => $shortLink,
        ];

        Link::query()->create($data);
        $request->session()->flash('success', 'Link successfully shortened!');
        return redirect()->route('home.index');
    }
}
