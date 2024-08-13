<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class RandomUserViewController extends Controller
{
    public function show()
    {
        return view('random-users');
    }
}
