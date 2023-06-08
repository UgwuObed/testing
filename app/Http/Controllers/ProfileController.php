<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function create()
    {
        return view('profile.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'country' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
        ]);

        $userId = $request->session()->get('user_id');

        Profile::create([
            'user_id' => $userId,
            'country' => $request->input('country'),
            'state' => $request->input('state'),
            'city' => $request->input('city'),
        ]);

        $request->session()->forget('user_id');

        return redirect('/dashboard')->with('success', 'Profile created successfully.');
    }
}

