<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::whereIn('role', ['operator_cabang', 'bag_pelaksanaan_cabang'])->get();
        return view('admin.user.index',compact('users'));
    }

    public function create(){
        return view('admin.user.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'username' => 'required|string|min:3|max:20|unique:users,username',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('operator_cabang.user')->with('success', 'User berhasil ditambahkan');
    }

    public function edit($id){
        $user = User::findOrFail($id);
        return view('admin.user.edit',compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'username' => 'required|string|min:3|max:20|unique:users,username,'.$id,
            'password' => 'nullable|string|min:6|confirmed',
            'role' => 'required',
        ]);
    
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->role = $request->role;
    
        // Jika password diisi, update passwordnya. Jika tidak, tetap gunakan password lama.
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }
    
        $user->save();
    
        return redirect()->route('operator_cabang.user')->with('success', 'User berhasil diupdate');
    }

    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('operator_cabang.user')->with('success', 'User berhasil dihapus');
    }
}
