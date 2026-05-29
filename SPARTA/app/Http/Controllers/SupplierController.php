<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $suppliers = Supplier::query()

            ->when($search, function ($query) use ($search) {

                $query->where(
                    'nama_supplier',
                    'like',
                    "%{$search}%"
                )

                    ->orWhere(
                        'kode_supplier',
                        'like',
                        "%{$search}%"
                    );
            })

            ->latest()

            ->paginate(10)

            ->withQueryString();

        return view(
            'supplier.index',
            compact('suppliers', 'search')
        );
    }
}
