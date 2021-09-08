<?php

namespace App\Http\Controllers;

use App\Repositories\LinkRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected $linkRepository;
    protected $userRepository;

    public function __construct(LinkRepositoryInterface $linkRepository, UserRepositoryInterface $userRepository)
    {
        $this->linkRepository = $linkRepository;
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $links = $this->linkRepository->getAllLinks();
        return view('admin.index')->with(['links' => $links]);
    }

    public function redirect(Request $request, $link)
    {
        $link = $this->linkRepository->getShortLink($link);
        if (!$link) {
            $request->session()->flash('error', 'Wrong link!');
            return redirect()->route('home.index');
        }
        $this->userRepository->createUser([
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return redirect($link->original_link);
    }

    public function destroy(Request $request, $id)
    {
        $this->linkRepository->deleteLink($id);
        $request->session()->flash('success', 'Link successfully deleted!');
        return redirect()->route('admin.index');
    }
}
