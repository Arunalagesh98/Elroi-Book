<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function users(Request $request)
    {
        info($request->search);
        return User::search($request->search)->limit(5)->get();
    }
}
