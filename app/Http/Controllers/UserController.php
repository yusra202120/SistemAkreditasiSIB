<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Models\LevelModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $data = UserModel::get();
        return view('user.index', compact('data'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'nama' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $data['email'] = $request->email;
        $data['name'] = $request->nama;
        $data['password'] = Hash::make($request->password);

        UserModel::create($data);

        return redirect()->route('user.index');
    }

    public function edit($id)
    {
        $data = UserModel::findOrFail($id);
        return view('user.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'nama' => 'required',
            'password' => 'nullable',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $data['email'] = $request->email;
        $data['name'] = $request->nama;

        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        UserModel::whereId($id)->update($data);

        return redirect()->route('user.index');
    }

    public function destroy($id)
    {
        $data = UserModel::find($id);
        if ($data) {
            $data->delete();
        }

        return redirect()->route('user.index');
    }
}
