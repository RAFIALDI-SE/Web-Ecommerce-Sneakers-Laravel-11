<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{


    public function profile_view()
    {
        $user = Auth::user();
        return view('profile_view', compact('user'));
    }


    public function edit_profile(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'password' => 'nullable|min:8|confirmed',
            'image'    => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        /** @var \App\Models\User $user */
        $user = Auth::user();


        $user->name = $request->name;


        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }


        if ($request->hasFile('image')) {

            if ($user->image && Storage::disk('public')->exists($user->image)) {
                Storage::disk('public')->delete($user->image);
            }


            $path = $request->file('image')->store('users', 'public');
            $user->image = $path;
        }

        $user->save();

        return Redirect::back()->with('success', 'Profil berhasil diperbarui!');
    }
}
