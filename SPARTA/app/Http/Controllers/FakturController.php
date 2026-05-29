<?php

namespace App\Http\Controllers;

use App\Models\Faktur;
use Illuminate\Http\Request;

class FakturController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $fakturs = Faktur::query()

            ->when($search, function ($query) use ($search) {

                $query->where(
                    'nomor_faktur',
                    'like',
                    "%{$search}%"
                );
            })

            ->latest()

            ->paginate(10)

            ->withQueryString();

        return view(
            'faktur.index',
            compact('fakturs', 'search')
        );
    }
}
