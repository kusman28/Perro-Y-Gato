<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function profile() {
        return auth('web')->user();
    }

    function update(Request $request) {

        $user = auth('web')->user();

        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email:filter|unique:users,email,'.$user->id,
            'password' => 'sometimes|required|string'
        ]);

        if (!empty($request->password)) {
            $request->merge(['password' => Hash::make($request['password'])]);
        }

        $user->update($request->all());

    }
}
