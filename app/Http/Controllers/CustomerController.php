<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class CustomerController extends Controller
{

    // Tampilkan Data Customer
    public function index(): View
    {
        return view('customer.tabel', [
            "title" => "Customer",
            "data"  => Customer::all()
        ]);
    }

    // Form Tambah Customer
    public function create(): View
    {
        return view('customer.tambah', [
            "title" => "Tambah Data Customer"
        ]);
    }

    // Simpan Data Customer
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            "name"    => "required",
            "email"   => "required",
            "phone"   => "required",
            "address" => "nullable"
        ]);

        Customer::create([
            'name'    => $request->name,
            'email'   => $request->email,
            'phone'   => $request->phone,
            'address' => $request->address,
        ]);

        return redirect()->route('pelanggan.index')
            ->with('success', 'Data Customer Berhasil Ditambahkan');
    }

    // Detail Customer
    public function show(Customer $pelanggan): View
    {
        return view('customer.tampil', [
            'title' => 'Detail Customer',
            'pelanggan' => $pelanggan
        ]);
    }

    // Form Edit Customer
    public function edit(Customer $pelanggan): View
    {
        return view('customer.edit', [
            'title' => 'Ubah Data Customer',
            'pelanggan' => $pelanggan
        ]);
    }

    // Update Customer
    public function update(Request $request, Customer $pelanggan): RedirectResponse
    {
        $request->validate([
            "name"    => "required",
            "email"   => "required",
            "phone"   => "required",
            "address" => "nullable"
        ]);

        $pelanggan->update([
            'name'    => $request->name,
            'email'   => $request->email,
            'phone'   => $request->phone,
            'address' => $request->address,
        ]);

        return redirect()->route('pelanggan.index')
            ->with('updated', 'Data Customer Berhasil Diubah');
    }

    // Hapus Customer
    public function destroy(Customer $pelanggan): RedirectResponse
    {
        $pelanggan->delete();

        return redirect()->route('pelanggan.index')
            ->with('deleted', 'Data Customer Berhasil Dihapus');
    }

}