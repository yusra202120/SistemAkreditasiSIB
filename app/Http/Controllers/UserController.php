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
        $roles = LevelModel::all();
        return view('user.create', compact('roles'));
    }

        public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|unique:m_user,username',
            'nama' => 'required',
            'password' => 'required',
            'role' => 'required|exists:m_level,level_id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $data = [
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => Hash::make($request->password),
            'level_id' => $request->role,
        ];

        UserModel::create($data);

        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan');
    }


    public function edit($id)
    {
        $data = UserModel::findOrFail($id);
        $roles = LevelModel::all();
        return view('user.edit', compact('data', 'roles'));
    }
    

        public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|unique:m_user,username,' . $id . ',user_id',
            'nama' => 'required',
            'password' => 'nullable',
            'role' => 'required|exists:m_level,level_id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $data = [
            'username' => $request->username,
            'nama' => $request->nama,
            'level_id' => $request->role,
        ];

        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        UserModel::where('user_id', $id)->update($data);

        return redirect()->route('user.index')->with('success', 'User berhasil diperbarui');
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
