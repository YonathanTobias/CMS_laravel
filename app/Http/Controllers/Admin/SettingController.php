<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::all()->pluck('value', 'key')->toArray();

        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $data = $request->except(['_token', 'profile_image_file']);

        // Handle Profile Image Upload (Foto Gedung Kampus Seksi 5)
        if ($request->hasFile('profile_image_file')) {
            $path = $request->file('profile_image_file')->store('settings', 'public');
            $data['profile_image_url'] = '/storage/'.$path;
        }

        foreach ($data as $key => $val) {
            if ($val !== null) {
                SiteSetting::set($key, $val);
            }
        }

        return redirect()->route('admin.settings.index')->with('success', 'Pengaturan situs dan gambar berhasil disimpan!');
    }
}
