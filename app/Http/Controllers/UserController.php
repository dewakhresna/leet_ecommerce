<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index($id)
    {
        $user = User::findorFail($id);
        return view('user.profile' , compact('user'));
    }
    public function edit($id)
    {
        $user = User::findorFail($id);
        return view('user.edit-profile' , compact('user'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'no_hp' => 'required',
            'alamat' => 'required',
            'foto_profile' => 'required',
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $user = User::findorFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->no_hp = $request->no_hp;
        $user->alamat = $request->alamat;

        if ($request->hasFile('foto_profile')) {
            $file = $request->file('foto_profile');
            $filename = date('Y-m-d_H-i-s') . '-' . $file->getClientOriginalName();
            $file->storeAs('assets/profile', $filename, 'public');
            $user->foto_profile = $filename;
        }

        $user->save();
        return redirect()->route('user.profile', $id);
    }
}
