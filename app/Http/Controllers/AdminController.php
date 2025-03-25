<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        return view('backend.admin', [
            'data' => User::All()
        ]);
    }
}
