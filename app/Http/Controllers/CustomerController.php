<?php
// app\Http\Controllers\CustomerController.php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Package;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $query = Customer::with('package');

        // Pencarian nama & filter paket
        if ($request->filled('search')) {
            $query->where('name', 'like', '%'.$request->search.'%');
        }
        if ($request->filled('package_id')) {
            $query->where('package_id', $request->package_id);
        }

        $customers = $query->paginate(10);
        $packages  = Package::all();

        return view('customers.index', compact('customers', 'packages'));
    }

    public function create()
    {
        $packages = Package::all();
        return view('customers.create', compact('packages'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'          => 'required|string|max:255',
            'email'         => 'required|email|unique:customers,email',
            'phone_number'  => [
                'required',
                'regex:/^\+?[0-9]{7,15}$/'
            ],
            'address'       => 'nullable|string',
            'package_id'    => 'nullable|exists:packages,id',
        ], [
            'phone_number.regex' => 'Nomor telepon tidak valid. Hanya angka (7–15 digit), boleh diawali +.',
        ]);

        Customer::create($data);

        return redirect()
            ->route('customers.index')
            ->with('success', 'Pelanggan berhasil ditambahkan.');
    }

    public function edit(Customer $customer)
    {
        $packages = Package::all();
        return view('customers.edit', compact('customer', 'packages'));
    }

    public function update(Request $request, Customer $customer)
    {
        $data = $request->validate([
            'name'          => 'required|string|max:255',
            'email'         => 'required|email|unique:customers,email,'.$customer->id,
            'phone_number'  => [
                'required',
                'regex:/^\+?[0-9]{7,15}$/'
            ],
            'address'       => 'nullable|string',
            'package_id'    => 'nullable|exists:packages,id',
        ], [
            'phone_number.regex' => 'Nomor telepon tidak valid. Hanya angka (7–15 digit), boleh diawali +.',
        ]);

        $customer->update($data);

        return redirect()
            ->route('customers.index')
            ->with('success', 'Pelanggan berhasil diupdate.');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()
            ->route('customers.index')
            ->with('success', 'Pelanggan berhasil dihapus.');
    }
}
