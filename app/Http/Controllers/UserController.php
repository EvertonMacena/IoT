<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Store a new user.
     *
     * @param  Request  $request
     * @return Response
     */

    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function show($id)
    {
        return User::findOrFail($id);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email'     => 'required|email|unique:users',
            'name'      => 'required',
            'password'  => 'required'
        ]);

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = password_hash($request->password, PASSWORD_BCRYPT);

        $user->save();

        return response()->json($user, 201);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'email'     => 'required|email',
            'name'      => 'required',
            'password'  => 'required'
        ]);

        $user = User::find($id);

        if (!$user){
            return response()->json(['error' => 'not found'], 404);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = password_hash($request->password, PASSWORD_BCRYPT);

        $user->save();

        return response()->json($user, 201);
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user){
            return response()->json(['error' => 'not found'], 404);
        }

        $user->delete();

        return response()->json('user removed successfully');
    }
}
