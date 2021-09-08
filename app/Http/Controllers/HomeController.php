<?php

namespace App\Http\Controllers;

use App\Repositories\LinkRepositoryInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $linkRepository;

    public function __construct(LinkRepositoryInterface $linkRepository)
    {
        $this->linkRepository = $linkRepository;
    }

    public function index()
    {
        return view('home.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'original_link' => 'required|url'
        ]);
        $faker = \Faker\Factory::create();
        $shortLink = $faker->safeColorName . $faker->buildingNumber;
        $data = [
            'original_link' => $request->original_link,
            'short_link' => $shortLink,
        ];

        $this->linkRepository->storeLink($data);

        $request->session()->flash('success', 'Link successfully shortened!');
        return redirect()->route('home.index');
    }
}
