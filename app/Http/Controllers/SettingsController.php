<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        return view('settings.index');
    }

    public function updateProfile(Request $request)
    {
        return response()->json(['success' => true]);
    }

    public function updateNotifications(Request $request)
    {
        return response()->json(['success' => true]);
    }

    public function updatePrivacy(Request $request)
    {
        return response()->json(['success' => true]);
    }

    public function updateLanguage(Request $request)
    {
        return response()->json(['success' => true]);
    }

    public function updateSecurity(Request $request)
    {
        return response()->json(['success' => true]);
    }

    public function changeLanguage(Request $request)
    {
        return response()->json(['success' => true]);
    }

    public function exportData(Request $request)
    {
        return response()->download(public_path('files/my_data.zip'));
    }

    public function deleteAccount(Request $request)
    {
        return response()->json(['success' => true]);
    }

    public function logoutAllDevices(Request $request)
    {
        return response()->json(['success' => true]);
    }
}