<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Supplier;
use App\Models\Customer;
use App\Models\Penjualan;
use App\Models\Faktur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OwnerDashboardController extends Controller
{
    public function index(Request $request)
    {
        // ==================================
        // FILTER TANGGAL
        // ==================================

        $filter = $request->get('filter', 'tahun');

        if ($filter == 'hari') {

            $startDate = now()->toDateString();
            $endDate = now()->toDateString();
        } elseif ($filter == 'bulan') {

            $startDate = now()->startOfMonth()->toDateString();
            $endDate = now()->endOfMonth()->toDateString();
        } elseif ($filter == 'custom') {

            $startDate = $request->start_date
                ?? now()->startOfMonth()->toDateString();

            $endDate = $request->end_date
                ?? now()->toDateString();
        } else {

            $startDate = now()->startOfYear()->toDateString();
            $endDate = now()->endOfYear()->toDateString();
        }

        // ==================================
        // KPI
        // ==================================

        $totalProduk = Product::count();

        $totalSupplier = Supplier::count();

        $totalCustomer = Customer::count();

        $totalPenjualan = Penjualan::whereBetween(
            'tanggal',
            [$startDate, $endDate]
        )->sum('total');

        $totalPembelian = DB::table('detail_fakturs')
            ->selectRaw('SUM(qty * harga) as total')
            ->value('total');

        $profit = $totalPenjualan - $totalPembelian;

        // ==================================
        // GRAFIK
        // ==================================

        $pendapatanBulanan = Penjualan::whereBetween(
            'tanggal',
            [$startDate, $endDate]
        )
            ->select(
                DB::raw("strftime('%Y-%m', tanggal) as bulan"),
                DB::raw('SUM(total) as total')
            )
            ->groupBy(
                DB::raw("strftime('%Y-%m', tanggal)")
            )
            ->orderBy(
                DB::raw("strftime('%Y-%m', tanggal)")
            )
            ->get();

        // ==================================
        // TOP PRODUK
        // ==================================

        $topProduk = DB::table('detail_penjualans')
            ->join(
                'products',
                'detail_penjualans.product_id',
                '=',
                'products.id'
            )
            ->select(
                'products.nama_produk',
                DB::raw('SUM(detail_penjualans.qty) as total_terjual'),
                DB::raw('SUM(detail_penjualans.subtotal) as total_pendapatan')
            )
            ->groupBy(
                'products.id',
                'products.nama_produk'
            )
            ->orderByDesc('total_terjual')
            ->limit(5)
            ->get();

        $totalProdukTerjual = DB::table('detail_penjualans')
            ->sum('qty');

        $dataHarian = Penjualan::select(
            'tanggal',
            DB::raw('SUM(total) as pendapatan')
        )
            ->groupBy('tanggal')
            ->orderBy('tanggal')
            ->get();

        // ==================================
        // TOP CUSTOMER
        // ==================================

        $topCustomer = DB::table('penjualans')
            ->join(
                'customers',
                'penjualans.customer_id',
                '=',
                'customers.id'
            )
            ->select(
                'customers.nama_customer',
                DB::raw('SUM(penjualans.total) as total_belanja')
            )
            ->groupBy(
                'customers.id',
                'customers.nama_customer'
            )
            ->orderByDesc('total_belanja')
            ->limit(5)
            ->get();

        // ==================================
        // STOK KRITIS
        // ==================================

        $stokKritis = Product::whereColumn(
            'stok',
            '<=',
            'stok_minimum'
        )->get();

        $totalStokKritis = $stokKritis->count();

        // ==================================
        // VIEW
        // ==================================

        return view(
            'dashboard.owner',
            compact(
                'filter',
                'dataHarian',
                'startDate',
                'endDate',
                'totalProduk',
                'totalSupplier',
                'totalCustomer',
                'totalPenjualan',
                'totalPembelian',
                'profit',
                'pendapatanBulanan',
                'topProduk',
                'topCustomer',
                'stokKritis',
                'totalProdukTerjual',
                'totalStokKritis'
            )
        );
    }
}
