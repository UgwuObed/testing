<?php
namespace App\Http\Controllers\Auth;
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class RegisterController extends Controller
{
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

    protected function create(Request $request)
    {
        $this->validator($request->all())->validate();

        $user = User::create([ 
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'business_name' => $request->input('business_name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'phone' => $request->input('phone'),
        ]);

        return redirect()->route('profile.create')->with('user_id', $user->id);
    }
}
