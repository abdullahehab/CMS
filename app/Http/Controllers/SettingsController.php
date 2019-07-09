<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingsRequest;
use App\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        return view('settings.index')->with('settings', Settings::first());
    }

    public function update(SettingsRequest $request, Settings $settings)
    {
        $validatedData = [
            'blog_name' => $request -> blog_name,
            'phone_number' => $request -> phone_number,
            'blog_email' => $request -> blog_email,
            'address' => $request -> address
        ];

        $settings = Settings::first();

        $settings->update($validatedData);

        return back();
    }
}
