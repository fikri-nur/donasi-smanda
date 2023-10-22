<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Http\Requests\StorecampaignRequest;
use App\Http\Requests\UpdatecampaignRequest;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $campaigns = Campaign::all(); // Ambil semua data campaign dari database
        // dd($campaigns);
        return view('welcome', ['campaigns' => $campaigns]);    
    }

    public function allCampaign()
    {
        $campaigns = Campaign::all(); // Ambil semua data campaign dari database
        return view('home.campaign.index', ['campaigns' => $campaigns]);    
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
    public function store(StorecampaignRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(campaign $campaign)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(campaign $campaign)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatecampaignRequest $request, campaign $campaign)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(campaign $campaign)
    {
        //
    }
}
