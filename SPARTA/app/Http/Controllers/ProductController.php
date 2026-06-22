<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $products = Product::query()
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('nama_produk', 'like', "%{$search}%")
                        ->orWhere('kode_produk', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('produk.index', compact('products', 'search'));
    }

    // ← Tambahkan di sini
    public function show(Product $product)
    {
        return view('produk.show', compact('product'));
    }

    public function create()
    {
        $suppliers = Supplier::all();

        return view('produk.create', compact('suppliers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_produk'  => 'required|unique:products',
            'nama_produk'  => 'required',
            'merk'         => 'required',
            'supplier_id'  => 'nullable|exists:suppliers,id',
            'stok'         => 'required|integer|min:0',
            'stok_minimum' => 'required|integer|min:0',
            'harga_beli'   => 'required|numeric|min:0',
            'harga_jual'   => 'required|numeric|min:0',
            'deskripsi'    => 'nullable',
        ]);

        Product::create($validated);

        return redirect()
            ->route('produk.index')
            ->with('success', 'Produk berhasil ditambahkan');
    }

    public function edit(Product $product)
    {
        $suppliers = Supplier::all();

        return view('produk.edit', compact('product', 'suppliers'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'kode_produk'  => 'required|unique:products,kode_produk,' . $product->id,
            'nama_produk'  => 'required',
            'merk'         => 'required',
            'supplier_id'  => 'nullable|exists:suppliers,id',
            'stok'         => 'required|integer|min:0',
            'stok_minimum' => 'required|integer|min:0',
            'harga_beli'   => 'required|numeric|min:0',
            'harga_jual'   => 'required|numeric|min:0',
            'deskripsi'    => 'nullable',
        ]);

        $product->update($validated);

        return redirect()
            ->route('produk.index')
            ->with('success', 'Produk berhasil diperbarui');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()
            ->route('produk.index')
            ->with('success', 'Produk berhasil dihapus');
    }
}
