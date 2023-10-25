<?php

namespace App\Http\Controllers;

use App\Models\Donatur;
use App\Http\Requests\StoreDonaturRequest;
use App\Http\Requests\UpdateDonaturRequest;
use Illuminate\Http\Request;

class DonaturController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $donaturs = Donatur::all();

        return view('dashboard.donatur.index', compact('donaturs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDonaturRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Donatur $donatur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Donatur $donatur)
    {
        return view('dashboard.donatur.edit', compact('donatur'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Donatur $donatur)
    {
        $request->validate([
            'payment_status' => 'required|in:paid,failed,pending',
            'status' => 'required|in:verified,unverified',
        ]);

        $donatur->payment_status = $request->input('payment_status');
        $donatur->status = $request->input('status');
        $donatur->verified_by = auth()->user()->name; // Admin yang melakukan validasi
        $donatur->verified_at = now(); // Waktu validasi
    
        $donatur->save();
    
        return redirect()->route('admin.donatur.index')->with('success', 'Donatur berhasil divalidasi.');    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Donatur $donatur)
    {
        //
    }
}
