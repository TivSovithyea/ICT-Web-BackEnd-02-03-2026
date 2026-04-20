<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index() {
        $users = [
            [
                'id' => 1,
                'name' => "Dara"
            ],
            [
                'id' => 2,
                'name' => "Kimsae"
            ],
            [
                'id' => 3,
                'name' => "Lika"
            ]
        ];

        return response()->json($users);
    }

    public function store(Request $request) {
        // dd($request->name);
        //Save to database
        return response()->json([
            'message' => "Successfully created User"
        ]);
    }
}
