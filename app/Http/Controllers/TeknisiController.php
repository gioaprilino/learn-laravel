<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeknisiController extends Controller
{
        public function index()
        {
            $users = Teknisi::all();
            return response()->json($users);
        }

        public function store(Request $request)
        {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:teknisis',
            ]);

            Teknisi::create($request->all());
            return response()->json(['message' => 'Teknisi berhasil dibuat']);
        }

        public function show($id)
        {
            $user = Teknisi::find($id);
            return response()->json($user);
        }

        public function update(Request $request, $id)
        {
            $user = Teknisi::findOrFail($id);
            $user->update($request->all());
            return response()->json(['message' => 'Teknisi diperbarui']);
        }

        public function destroy($id)
        {
            Teknisi::destroy($id);
            return response()->json(['message' => 'Teknisi dihapus']);
        }

}
