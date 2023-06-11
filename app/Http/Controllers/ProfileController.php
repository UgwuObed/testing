<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('profile.show', ['user' => $user]);
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $user->state = $request->input('state');
        $user->city = $request->input('city');
        $user->save();

        return redirect()->route('dashboard');
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $user->state = $request->input('state');
        $user->city = $request->input('city');
        $user->save();

        return redirect()->route('dashboard');
    }
}
