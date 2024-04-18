<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        $users = User::all();
        return view('admin-dashboard', compact('users'));
    }
    
    public function assignRole(Request $request)
    {
        // Provjeri da li je korisnik s ulogom "admin"
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Only admins can assign roles.');
        }

        // Validacija zahtjeva
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'role' => 'required|in:teacher,student,admin',
        ]);

        // Pronađi korisnika po ID-u
        $user = User::findOrFail($request->user_id);

        // Dodijeli ulogu korisniku
        $user->update(['role' => $request->role]);

        return redirect()->back()->with('success', 'Role assigned successfully.');
    }
}
