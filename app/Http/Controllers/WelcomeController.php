<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class WelcomeController extends Controller
{
    public function welcome()
    {
        return route('welcome.blade.php')->with()->User::all();
    }
}
