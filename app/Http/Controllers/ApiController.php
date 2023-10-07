<?php

namespace App\Http\Controllers;

use App\Models\User;


use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getData($id = null)
    {
        $data = $id ? User::find($id) : User::all();
        return $data;
    }

    public function addUser(Request $request)
    {
        $request->validate(['name' => 'required']);
        $input = $request->all();
        $result = User::create($input);

        if ($result) {
            return [
                'status' => '200',
                'message' => 'User Saved Successfully!',
                'data' => $input
            ];
        } else {
            return [
                'status' => '404',
                'message' => 'User cannot Saved Successfully!',
                'data' => $input
            ];
        }
    }
}
