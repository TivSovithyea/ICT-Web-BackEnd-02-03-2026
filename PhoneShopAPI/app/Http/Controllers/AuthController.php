<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Throwable;

class AuthController extends Controller
{
    public function register(RegisterRequest $request) {

        // save to profile

        DB::beginTransaction();

        try {

            $profile = new Profile();
            $profile->phone = $request->phone_number;
            $profile->save();

            // save to user
            $user = new User();
            $user->name = $request->name;
            //error
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->profile_id = $profile->id;
            $user->save();

            DB::commit();

            return response()->json([
                'data' => $user,
                'message' => 'Successfully registered'
            ]);

        } catch(Throwable $ex) {

            DB::rollBack();
            return response()->json([
                'message' => $ex->getMessage()
            ],400);
        }
    }


    public function login(LoginRequest $request) {

        $user = User::where('email', $request->email)->first();

        if($user) {

            if(Hash::check($request->password, $user->password)) {
                $token = $user->createToken('accessToken')->plainTextToken;
                return response()->json([
                    'data' => $token,
                    'message' => 'Successfully logged in'
                ]);
                // success
            } else {
                return response()->json([
                    'message' => 'Invalid password'
                ]);
            }

        } else {
            return response()->json([
                'message' => 'Invalid email'
            ]);
        }

    }
}
