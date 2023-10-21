<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Arr;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::all();
        return view('list', ['data'=> $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('all_in_one');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'f_name'=>'required|regex:(^([a-zA-z ]+)?$)',
            // 'm_name'=>'regex:(^([a-zA-z ]+)?$)',
            // 'l_name'=>'regex:(^([a-zA-z ]+)?$)',
            // 'email'=>'required|regex:(^((?!\.)[\w\-_.]*[^.])(@\w+)(\.\w+(\.\w+)?[^.\W])$)',
            // 'mobile'=>'required|regex:(^((?:[1-9][0-9 ().-]{5,28}[0-9])|(?:(00|0)( ){0,1}[1-9][0-9 ().-]{3,26}[0-9])|(?:(\+)( ){0,1}[1-9][0-9 ().-]{4,27}[0-9]))$)',
            // 'password'=>'required',
        ],[
            'f_name.regex' => "First name contains only letters."
        ]);
        $input = $request->all();
        User::create($input);
        return redirect('user');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = User::where('id',$id)->get();
        return view('list', ['data'=> $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = User::where('id',$id)->first();

        return view('all_in_one',['data'=> $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'f_name'=>'required|regex:(^([a-zA-z ]+)?$)',
            'm_name'=>'regex:(^([a-zA-z ]+)?$)',
            'l_name'=>'regex:(^([a-zA-z ]+)?$)',
            'email'=>'required|regex:(^((?!\.)[\w\-_.]*[^.])(@\w+)(\.\w+(\.\w+)?[^.\W])$)',
            'mobile'=>'required|regex:(^((?:[1-9][0-9 ().-]{5,28}[0-9])|(?:(00|0)( ){0,1}[1-9][0-9 ().-]{3,26}[0-9])|(?:(\+)( ){0,1}[1-9][0-9 ().-]{4,27}[0-9]))$)',
            'password'=>'required'
        ],[
            'f_name.regex' => "First name contains only letters.",
            'f_name.required' => "First name is required."
        ]);
        $input = $request->all();
        $input = Arr::except($input, ['_token','_method']);
        User::find($id)->update($input);
        
        return redirect('user')->withSuccess('Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
