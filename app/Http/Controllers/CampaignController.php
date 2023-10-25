<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Donatur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CampaignController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $campaigns = Campaign::all();

        return view('dashboard.campaign.index', compact('campaigns'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.campaign.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'name' => 'required|string|max:255',
            'goal' => 'required|numeric',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'carousel' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'status' => 'required|in:open,close,hold',
        ]);

        // Simpan gambar campaign ke folder public/images
        $fileGambar = $request->file('image');
        $extGambar = $fileGambar->getClientOriginalExtension();
        $gambarPath = $fileGambar->storeAs("/Campaign/{$request->input('name')}", $request->input('name') .  '_cover' . '.' . $extGambar, 'public');

        $fileCarousel = $request->file('carousel');
        $extCarousel = $fileCarousel->getClientOriginalExtension();
        $carouselPath = $fileCarousel->storeAs("/Campaign/{$request->input('name')}", $request->input('name') .  '_carousel' . '.' . $extCarousel, 'public');

        // Buat record campaign baru
        Campaign::create([
            'name' => $request->input('name'),
            'goal' => $request->input('goal'),
            'description' => $request->input('description'),
            'image' => $gambarPath,
            'carousel' => $carouselPath,
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'status' => $request->input('status'),
            'user_id' => auth()->user()->id,
        ]);

        // Redirect ke halaman campaign
        return redirect()->route('admin.campaign.index')->with('primary', 'Campaign berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Campaign $campaign)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Campaign $campaign)
    {
        return view('dashboard.campaign.edit', compact('campaign'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Campaign $campaign)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'goal' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'status' => 'required|in:open,close,hold',
            'image' => 'nullable|image|mimes:jpeg,jpg,png',
            'carousel' => 'nullable|image|mimes:jpeg,jpg,png',
        ]);

        $data = $request->except(['_token', '_method']);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('campaigns', 'public');
            $data['image'] = $imagePath;
        }

        if ($request->hasFile('carousel')) {
            $carouselPath = $request->file('carousel')->store('campaigns', 'public');
            $data['carousel'] = $carouselPath;
        }

        $campaign->update($data);

        return redirect()->route('admin.campaign.index')->with('success', 'Data campaign berhasil diupdate!');
    }

    public function delete(Campaign $campaign)
    {
        return view('dashboard.campaign.delete', compact('campaign'));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Campaign $campaign)
    {
        // Get the full file paths for the images
        $imagePath = public_path("storage/{$campaign->image}");
        $carouselPath = public_path("storage/{$campaign->carousel}");

        // Check if the files exist before attempting to delete them
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }

        if (File::exists($carouselPath)) {
            File::delete($carouselPath);
        }

        // Delete campaign from the database
        $campaign->delete();

        return redirect()->route('admin.campaign.index')->with('success', 'Campaign berhasil dihapus.');
    }
}
