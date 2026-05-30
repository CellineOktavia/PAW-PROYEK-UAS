<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;
use App\Models\DetailPenjualan;
use App\Models\Product;
use App\Models\Customer;
use App\Models\StockMovement;
use Illuminate\Support\Facades\Auth;

class PenjualanController extends Controller
{
    public function index()
    {
        $penjualans = Penjualan::with(
            'customer'
        )
            ->latest()
            ->paginate(10);

        return view(
            'penjualan.index',
            compact('penjualans')
        );
    }

    public function create()
    {
        $customers = Customer::all();

        $products = Product::all();

        return view(
            'penjualan.create',
            compact(
                'customers',
                'products'
            )
        );
    }

    public function store(Request $request)
    {
        $request->validate([

            'customer_id' =>
            'required',

            'product_id' =>
            'required',

            'qty' =>
            'required|integer|min:1',

            'tanggal' =>
            'required',

        ]);

        $product = Product::findOrFail(
            $request->product_id
        );

        if (
            $product->stok <
            $request->qty
        ) {

            return back()
                ->with(
                    'error',
                    'Stok tidak mencukupi'
                );
        }

        $subtotal =
            $request->qty *
            $product->harga_jual;

        $penjualan = Penjualan::create([

            'nomor_penjualan' =>
            'PJ-' .
                now()->format('YmdHis'),

            'customer_id' =>
            $request->customer_id,

            'user_id' =>
            Auth::id(),

            'tanggal' =>
            $request->tanggal,

            'total' =>
            $subtotal

        ]);

        DetailPenjualan::create([

            'penjualan_id' =>
            $penjualan->id,

            'product_id' =>
            $product->id,

            'qty' =>
            $request->qty,

            'harga' =>
            $product->harga_jual,

            'subtotal' =>
            $subtotal

        ]);

        // Kurangi stok otomatis
        StockMovement::create([

            'product_id' =>
            $product->id,

            'jenis' =>
            'keluar',

            'qty' =>
            $request->qty,

            'keterangan' =>
            'Penjualan ' .
                $penjualan->nomor_penjualan,

        ]);

        return redirect()
            ->route(
                'penjualan.index'
            )
            ->with(
                'success',
                'Penjualan berhasil dibuat'
            );
    }

    public function show(
        Penjualan $penjualan
    ) {
        $penjualan->load([
            'customer',
            'detailPenjualans.product'
        ]);

        return view(
            'penjualan.show',
            compact('penjualan')
        );
    }

    public function destroy(
        Penjualan $penjualan
    ) {
        foreach (
            $penjualan->detailPenjualans
            as $detail
        ) {

            if ($detail->product) {

                $detail->product->increment(
                    'stok',
                    $detail->qty
                );

                StockMovement::create([

                    'product_id' =>
                    $detail->product->id,

                    'jenis' =>
                    'masuk',

                    'qty' =>
                    $detail->qty,

                    'keterangan' =>
                    'Pembatalan Penjualan ' .
                        $penjualan->nomor_penjualan,

                ]);
            }
        }

        $penjualan->delete();

        return redirect()
            ->route('penjualan.index')
            ->with(
                'success',
                'Penjualan berhasil dihapus'
            );
    }
}
