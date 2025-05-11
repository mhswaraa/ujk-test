<?php
// app\Http\Controllers\PackageController.php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Customer;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index(Request $request)
    {
        $query = Package::query();

        // Pencarian dan filter berdasarkan kecepatan
        if ($request->filled('search')) {
            $query->where('name', 'like', '%'.$request->search.'%');
        }
        if ($request->filled('speed')) {
            $query->where('speed', $request->speed);
        }

        $packages = $query->paginate(10);

        return view('packages.index', compact('packages'));
    }

    public function create()
    {
        return view('packages.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'  => 'required|string|max:255',
            'speed' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        Package::create($data);

        return redirect()->route('packages.index')
                         ->with('success', 'Paket berhasil ditambahkan.');
    }

    public function edit(Package $package)
    {
        return view('packages.edit', compact('package'));
    }

    public function update(Request $request, Package $package)
    {
        $data = $request->validate([
            'name'  => 'required|string|max:255',
            'speed' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        $package->update($data);

        return redirect()->route('packages.index')
                         ->with('success', 'Paket berhasil diupdate.');
    }

    public function destroy(Package $package)
{
    // 1) Me–nullify semua customer yang pakai paket ini
    Customer::where('package_id', $package->id)
            ->update(['package_id' => null]);

    // 2) Hapus paket
    $package->delete();

    return redirect()
           ->route('packages.index')
           ->with('success', 'Paket berhasil dihapus.');
}
}
