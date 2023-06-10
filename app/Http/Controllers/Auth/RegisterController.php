<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

public function store(Request $request)
{
    $this->validator($request->all())->validate();

    $user = $this->createUser($request);

    auth()->login($user);

    return redirect()->route('dashboard');
}

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'business_name' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'string', 'min:10', 'max:20', 'unique:users'],
        ]);
    }

    protected function createUser(Request $request)
    {
        return User::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'business_name' => $request->input('business_name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'phone' => $request->input('phone'),
        ]);
    }
}
