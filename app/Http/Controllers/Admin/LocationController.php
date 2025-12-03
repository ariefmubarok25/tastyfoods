<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        // akan mengambil row pertama
        $location = Location::first();

        // jika belum ada data sama sekali, buat kosong
        if (!$location) {
            $location = Location::create(['src_link' => null]);
        }

        return view('admin.location.index', compact('location'));
    }

    public function edit(Location $location)
    {
        return view('admin.location.edit', compact('location'));
    }

    public function update(Request $request, Location $location)
    {
        $request->validate([
            'src_link' => 'nullable|string',
        ]);

        $location->update([
            'src_link' => $request->src_link,
        ]);

        return redirect()->route('admin.location.index')->with('success', 'Lokasi berhasil diperbarui');
    }
}
