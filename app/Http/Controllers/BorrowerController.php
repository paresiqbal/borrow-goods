<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class BorrowerController extends Controller
{
    public function index()
    {
        $borrowers = User::all();
        return view('borrowers.index', compact('borrowers'));
    }

    public function create()
    {
        return view('borrowers.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'phone'    => 'nullable|string|max:20',
            'position' => 'nullable|string|max:255',
            'password' => 'required|string|min:6|confirmed'
        ]);

        // Hash the password as needed
        $data['password'] = Hash::make($data['password']);

        User::create($data);

        return redirect()->route('borrowers.index')->with('success', 'Borrower created successfully');
    }

    public function show(User $borrower)
    {
        return view('borrowers.show', compact('borrower'));
    }

    public function edit(User $borrower)
    {
        return view('borrowers.edit', compact('borrower'));
    }

    public function update(Request $request, User $borrower)
    {
        $data = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email,' . $borrower->id,
            'phone'    => 'nullable|string|max:20',
            'position' => 'nullable|string|max:255',
            'password' => 'nullable|string|min:6|confirmed'
        ]);

        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $borrower->update($data);

        return redirect()->route('borrowers.index')->with('success', 'Borrower updated successfully');
    }

    public function destroy(User $borrower)
    {
        $borrower->delete();

        return redirect()->route('borrowers.index')->with('success', 'Borrower deleted successfully');
    }
}
