<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class RegisterController extends Controller
{
        protected function create(array $data)
        {
            return User::create([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'business_name' => $data['business_name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'phone' => $data['phone'],
                'state' => $data['state'],
                'country' => $data['country'],
                'city' => $data['city'],
            ]);
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
                'state' => ['required', 'string', 'max:255'],
                'country' => ['required', 'string', 'max:255'],
                'city' => ['required', 'string', 'max:255'],
            ]);
        }

    
        protected $fillable = [
            'first_name',
            'last_name',
            'business_name',
            'email',
            'password',
            'phone',
            'state',
            'country',
            'city',
        ];

}
