<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookmarkController extends Controller
{
    public function index()
    {
        return view('bookmarks.index');
    }

    public function clearAll(Request $request)
    {
        return response()->json(['success' => true]);
    }

    public function export(Request $request)
    {
        return response()->download(public_path('files/bookmarked_jobs.pdf'));
    }
}