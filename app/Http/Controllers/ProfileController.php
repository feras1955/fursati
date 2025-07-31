<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }

    public function edit()
    {
        return view('profile.index'); // You can create a separate edit view if needed
    }

    public function update(Request $request)
    {
        // Placeholder for update logic
        return redirect()->route('profile.index');
    }

    public function uploadAvatar(Request $request)
    {
        // Placeholder for AJAX avatar upload
        return response()->json(['success' => true]);
    }

    public function uploadCV(Request $request)
    {
        // Placeholder for AJAX CV upload
        return response()->json(['success' => true]);
    }
}