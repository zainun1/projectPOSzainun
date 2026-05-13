<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
class ProductController extends Controller

{
    // Tampil data produk
    public function index()
    {
        return view('product.index', [
            'title' => 'Produk',
            'data'  => Product::all()
        ]);
    }

    // Form tambah produk
    public function create()
    {
        return view('product.create', [
            'title'    => 'Tambah Produk',
            'kategori' => Category::all()
        ]);
    }

    // Simpan produk
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required',
            'stock'       => 'required',
            'category_id' => 'required',
            'price'       => 'required',
            'description' => 'nullable'
        ]);

        Product::create([
            'name'        => $request->name,
            'stock'       => $request->stock,
            'category_id' => $request->category_id,
            'price'       => $request->price,
            'description' => $request->description
        ]);

       return redirect()->route('produk.index')
    ->with('success', 'Produk berhasil ditambahkan');
    }

    // Detail produk
    public function show(Product $produk)
    {
        return view('product.show', [
            'title' => 'Detail Produk',
            'produk' => $produk
        ]);
    }

    // Form edit produk
    public function edit(Product $produk)
    {
        return view('product.edit', [
            'title' => 'Edit Produk',
            'produk' => $produk,
            'kategori' => Category::all()
        ]);
    }
    public function update(Product $produk, Request $request):RedirectResponse
{
    $request->validate([
        "name"=>"required",
        "description"=>"nullable",
        "stock"=>"required",
        "price"=>"required",
        "category_id"=>"required"
    ]);

    $produk->update($request->all());
    return redirect()->route('produk.index')->with('updated','Data Produk Berhasil Diubah');
}
public function destroy($id):RedirectResponse
{
    Product::where('id',$id)->delete();
    return redirect()->route('produk.index')->with('deleted','Data Produk Berhasil Dihapus');
}
}