<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelpController extends Controller
{
    public function index()
    {
        return view('help.index');
    }

    public function submitTicket(Request $request)
    {
        // Placeholder for support ticket logic
        return response()->json(['success' => true]);
    }
}