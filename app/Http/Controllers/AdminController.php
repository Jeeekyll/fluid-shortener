<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $links = Link::all();
        return view('admin.index')->with(['links' => $links]);
    }

    public function redirect(Request $request, $link)
    {
        $link = Link::where('short_link', $link)->first();
        if (!$link) {
            $request->session()->flash('error', 'Wrong link!');
            return redirect()->route('home.index');
        }

        User::create([
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return redirect($link->original_link);
    }

    public function destroy(Request $request, $id)
    {
        Link::query()->findOrFail($id)->delete();
        $request->session()->flash('success', 'Link successfully deleted!');
        return redirect()->route('admin.index');
    }
}
