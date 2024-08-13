<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class RandomUserController extends Controller
{
    public function index()
    {
         $response = Http::get('https://randomuser.me/api/?results=5');

        if ($response->successful()) {
            $users = $response->json('results');
            return view('random-users', compact('users'));
        } else {
            return view('random-users', ['users' => []]); // En caso de error, pasar una lista vacía
        }
    }

    public function getUsers()
    {
        $response = Http::get('https://randomuser.me/api/?results=5');
        $users = $response->json()['results'];

        $names = array_column($users, 'name');
        $fullNames = array_map(function($name) {
            return $name['first'] . ' ' . $name['last'];
        }, $names);

        $allNames = implode('', $fullNames);
        $letterCounts = array_count_values(str_split(strtolower($allNames)));

        arsort($letterCounts);
        $mostFrequentLetter = key($letterCounts);

        return response()->json([
            'users' => $users,
            'most_frequent_letter' => $mostFrequentLetter
        ]);
    }
}
