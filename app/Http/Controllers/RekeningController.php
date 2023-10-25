<?php

namespace App\Http\Controllers;

use App\Models\Rekening;
use App\Http\Requests\StoreRekeningRequest;
use App\Http\Requests\UpdateRekeningRequest;
use Illuminate\Http\Request;

class RekeningController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rekenings = Rekening::all();
        return view('dashboard.rekening.index', compact('rekenings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.rekening.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_bank' => 'required|string|max:255',
            'nama_pemilik' => 'required|string|max:255',
            'nomor_rekening' => 'required|string|max:255',
        ]);

        Rekening::create([
            'nama_bank' => $request->nama_bank,
            'nama_pemilik' => $request->nama_pemilik,
            'nomor_rekening' => $request->nomor_rekening,
        ]);

        return redirect()->route('admin.rekening.index')->with('primary', 'Rekening berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rekening $rekening)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rekening $rekening)
    {
        return view('dashboard.rekening.edit', compact('rekening'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rekening $rekening)
    {
        $request->validate([
            'nama_bank' => 'required|string|max:255',
            'nama_pemilik' => 'required|string|max:255',
            'nomor_rekening' => 'required|string|max:255',
        ]);

        $rekening->update([
            'nama_bank' => $request->nama_bank,
            'nama_pemilik' => $request->nama_pemilik,
            'nomor_rekening' => $request->nomor_rekening,
        ]);

        return redirect()->route('admin.rekening.index')->with('success', 'Data rekening berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Rekening $rekening)
    {
        return view('dashboard.rekening.delete', compact('rekening'));
    }

    public function destroy(Rekening $rekening)
    {
        $rekening->delete();
        return redirect()->route('admin.rekening.index')->with('danger', 'Rekening berhasil dihapus.');
    }
}
