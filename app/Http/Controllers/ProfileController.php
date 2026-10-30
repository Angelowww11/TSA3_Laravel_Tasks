<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function index(): View
    {
        $user = User::sole();

        return view('profile.index', compact('user'));
    }
}
