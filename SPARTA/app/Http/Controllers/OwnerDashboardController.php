<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Supplier;
use App\Models\Customer;
use App\Models\Penjualan;
use App\Models\Faktur;
use Illuminate\Support\Facades\DB;

class OwnerDashboardController extends Controller
{
    public function index()
    {
        $totalProduk = Product::count();

        $totalSupplier = Supplier::count();

        $totalCustomer = Customer::count();

        $totalPenjualan = Penjualan::sum('total');

        $totalPembelian = Faktur::sum('total');

        $profit = $totalPenjualan - $totalPembelian;

        $pendapatanBulanan = Penjualan::select(
            DB::raw("strftime('%Y-%m', tanggal) as bulan"),
            DB::raw('SUM(total) as total')
        )
            ->groupBy(DB::raw("strftime('%Y-%m', tanggal)"))
            ->orderBy(DB::raw("strftime('%Y-%m', tanggal)"), 'asc')
            ->get();
        $topProduk = DB::table('detail_penjualans')
            ->join(
                'products',
                'detail_penjualans.product_id',
                '=',
                'products.id'
            )
            ->select(
                'products.nama_produk',
                DB::raw('SUM(qty) as total_terjual')
            )
            ->groupBy(
                'products.id',
                'products.nama_produk'
            )
            ->orderByDesc('total_terjual')
            ->limit(5)
            ->get();

        $topCustomer = DB::table('penjualans')
            ->join(
                'customers',
                'penjualans.customer_id',
                '=',
                'customers.id'
            )
            ->select(
                'customers.nama_customer',
                DB::raw('SUM(total) as total_belanja')
            )
            ->groupBy(
                'customers.id',
                'customers.nama_customer'
            )
            ->orderByDesc('total_belanja')
            ->limit(5)
            ->get();

        $stokKritis = Product::whereColumn(
            'stok',
            '<=',
            'stok_minimum'
        )->get();

        return view(
            'dashboard.owner',
            compact(
                'totalProduk',
                'totalSupplier',
                'totalCustomer',
                'totalPenjualan',
                'totalPembelian',
                'profit',
                'pendapatanBulanan',
                'topProduk',
                'topCustomer',
                'stokKritis'
            )
        );
    }
}
