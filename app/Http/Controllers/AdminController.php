<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $links = Link::all();
        return view('admin.index')->with(['links' => $links]);
    }

    public function destroy(Request $request, $id)
    {
        Link::query()->findOrFail($id)->delete();
        $request->session()->flash('success', 'Link successfully deleted!');
        return redirect()->route('admin.index');
    }
}
