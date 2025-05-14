<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LevelModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Monolog\Level;

class LevelController extends Controller
{
    public function index()
    {
        $data = LevelModel::get();
        return view('level.index', compact('data'));
    }

    public function create()
    {
        return view('level.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'level_kode' => 'required|unique:m_level,level_kode',
            'role' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $data = [
            'level_kode' => $request->level_kode,
            'role' => $request->role,
        ];

        LevelModel::create($data);

        return redirect()->route('level.index')->with('success', 'Level berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = LevelModel::findOrFail($id);
        return view('level.edit', compact('data'));
    }
    

        public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'level_kode' => 'required|unique:m_level,level_kode',
            'role' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $data = [
            'level_kode' => $request->level_kode,
            'role' => $request->role,
        ];

        LevelModel::where('level_id', $id)->update($data);

        return redirect()->route('level.index')->with('success', 'Level berhasil diperbarui');
    }

    public function destroy($id)
    {
        $data = LevelModel::find($id);
        if ($data) {
            $data->delete();
        }

        return redirect()->route('level.index');
    }




}
