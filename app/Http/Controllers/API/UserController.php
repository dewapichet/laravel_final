<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\MUser;
use App\Province;

class UserController extends Controller
{
    public function login (Request $request) {
        $username = $request -> get('username');
        $password = $request -> get('password');
        $users = MUser::all()->where('username', '=', $username)->where('password', '=', $password);
        
        $data = array();
        foreach ($users as $key => $value) {
            array_push($data, $users[$key]);
        }

        if (count($data) > 0) {
            return response()->json($data[0]);
        } else {
            return response()->json('error');
        }
    }

    public function register (Request $request) {
        if ($request -> get('user_role') === 'member') {
            $users = new MUser([
                'first_name' => $request -> get('first_name'),
                'last_name' => $request -> get('last_name'),
                'username' => $request -> get('username'),
                'password' => $request -> get('password'),
                //'confirm_password' => $request -> get('confirm_password'),
                'email' => $request -> get('email'),
                'age' => $request -> get('age'),
                'tel' => $request -> get('tel'),
                // 'passport_id' => $request -> get('passport_id'),
                // 'passport_image' => $request -> file('passport_image')->store('/passport_image', 'public'),
                // 'passport_certificate_image' => $request -> file('passport_certificate_image')->store('/passport_certificate_image', 'public'),
                'profile_image' => $request -> file('profile_image')->store('/images', 'public'),
                'province' => $request -> get('province'),
                'user_role' => $request -> get('user_role'),
            ]);
    
            $users -> save();
        } else {
            $users = new MUser([
                'first_name' => $request -> get('first_name'),
                'last_name' => $request -> get('last_name'),
                'username' => $request -> get('username'),
                'password' => $request -> get('password'),
                //'confirm_password' => $request -> get('confirm_password'),
                'email' => $request -> get('email'),
                'age' => $request -> get('age'),
                'tel' => $request -> get('tel'),
                'passport_id' => $request -> get('passport_id'),
                'passport_image' => $request -> file('passport_image')->store('/passport_image', 'public'),
                'passport_certificate_image' => $request -> file('passport_certificate_image')->store('/passport_certificate_image', 'public'),
                // 'profile_image' => $request -> file('profile_image')->store('/images', 'public'),
                'province' => $request -> get('province'),
                'user_role' => $request -> get('user_role'),
            ]);
    
            $users -> save();
        }

        return response()->json($users);
    }

    public function get_profile (Request $request, $id) {
        $users = MUser::find($id);
        return response()->json($users);
    }

    public function update_profile (Request $request, $id) {
        $users = MUser::find($id);
        $users->first_name = $request -> get('first_name');
        $users->last_name = $request -> get('last_name');
        $users->email = $request -> get('email');
        $users->age = intval($request -> get('age'));
        $users->tel = $request -> get('tel');
        $users -> save();
        return response()->json('success');
    }

    public function get_province (Request $request) {
        $province = Province::all();
        return response()->json($province);
    }
}
