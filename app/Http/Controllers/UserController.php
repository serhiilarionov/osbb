<?php

namespace App\Http\Controllers;

use App\Models\Appeal;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        return User::all();
    }

    public function store(Request $request)
    {
        $user = User::create($request->all());
        
        return response()->json($user, 201);
    }

    public function appeals(User $user)
    {
        $appeals = $user->appeals;

        return response()->json($appeals, 201);
    }

    public function storeAppeal(Request $request, User $user)
    {
        $appeal = new Appeal($request->all());
        $appeal->client_id = $user;
        $user->appeals()->save($appeal);

        return response()->json($appeal, 201);
    }
}
