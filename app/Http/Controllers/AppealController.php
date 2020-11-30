<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appeal;

class AppealController extends Controller
{
    public function index()
    {
        return Appeal::all();
    }

    public function takeInWork(Appeal $appeal)
    {
        $appeal->in_work = true;
        
        return response()->json($appeal, 201);
    }
    
}