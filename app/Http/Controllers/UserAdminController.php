<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (auth()->user()->role_id == '2') {
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect('/');
        }

        return view('dashboard.users.index', [
            'users' => User::orderBy('nama', 'asc')->Filter(Request(['searchUsers']))->paginate(5)->withQueryString(),
            'tittlePage'    =>  "Profil " . strtoupper(auth()->user()->nama)

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.users.create', [
            'roles'  =>  Role::all(),
            'tittlePage'    =>  "Tambah User " . strtoupper(auth()->user()->nama)

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateCreate = $request->validate([
            'image'             =>  'image',
            'role_id'           =>  'required',
            'nama'              =>  'required',
            'username'          =>  'required',
            'email'             =>  'required|email:dns',
            'alamat'            =>  'required',
            'telp'              =>  'required',
            'password'          =>  'required'
        ]);

        if ($request->file('image')) {
            $validateCreate['image']  =   $request->file('image')->store('image-users');
        }

        $validateCreate['password'] = Hash::make($validateCreate['password']);

        User::create($validateCreate);

        return redirect('/dashboard/users')->with('success', "Tambah User ($request->nama) Sukses");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('dashboard.users.show', [
            'user' =>  $user,
            'tittlePage'    =>  "Detail User " . strtoupper(auth()->user()->nama)

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('dashboard.users.edit', [
            'user'      =>  $user,
            'roles'     =>  Role::all(),
            'tittlePage'    =>  "Edit User " . strtoupper(auth()->user()->nama)

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validateUpdate = $request->validate([
            'image'             =>  'image',
            'role_id'           =>  'required',
            'nama'              =>  'required',
            'username'          =>  'required',
            'email'             =>  'required|email:dns',
            'alamat'            =>  'required',
            'telp'              =>  'required',
        ]);

        if ($request->file('image')) {
            if ($request->imageprodukOld) {
                Storage::delete($request->imageprodukOld);
            }

            $validateUpdate['image']    =   $request->file('image')->store('image-users');
        }

        User::where('id', $user->id)
            ->update($validateUpdate);

        if (auth()->user()->role_id == '2') {
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect('/');
        }

        return redirect('/dashboard/users')->with('success', "Update User ($user->nama) Success");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user->image) {
            Storage::delete($user->image);
        }

        User::destroy($user->id);

        return redirect('/dashboard/users')->with('success', "Delete User ($user->nama) Sukses");
    }
}
