<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $customers = Customer::query()

            ->when($search, function ($query)
            use ($search) {

                $query->where(
                    'nama_customer',
                    'like',
                    "%{$search}%"
                )

                    ->orWhere(
                        'kode_customer',
                        'like',
                        "%{$search}%"
                    );
            })

            ->latest()

            ->paginate(10)

            ->withQueryString();

        return view(
            'customer.index',
            compact(
                'customers',
                'search'
            )
        );
    }

    public function create()
    {
        return view(
            'customer.create'
        );
    }

    public function store(Request $request)
    {
        $validated = $request->validate([

            'kode_customer' =>
            'required|unique:customers',

            'nama_customer' =>
            'required',

            'telepon' =>
            'nullable',

            'email' =>
            'nullable|email',

            'alamat' =>
            'nullable',

        ]);

        Customer::create($validated);

        return redirect()
            ->route('customer.index')
            ->with(
                'success',
                'Customer berhasil ditambahkan'
            );
    }

    public function edit(Customer $customer)
    {
        return view(
            'customer.edit',
            compact('customer')
        );
    }

    public function update(
        Request $request,
        Customer $customer
    ) {

        $validated = $request->validate([

            'kode_customer' =>
            'required|unique:customers,kode_customer,' .
                $customer->id,

            'nama_customer' =>
            'required',

            'telepon' =>
            'nullable',

            'email' =>
            'nullable|email',

            'alamat' =>
            'nullable',

        ]);

        $customer->update($validated);

        return redirect()
            ->route('customer.index')
            ->with(
                'success',
                'Customer berhasil diperbarui'
            );
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()
            ->route('customer.index')
            ->with(
                'success',
                'Customer berhasil dihapus'
            );
    }

    public function show(Customer $customer)
    {
        return view('customer.show', compact('customer'));
    }
}
