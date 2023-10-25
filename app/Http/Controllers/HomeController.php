<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Donatur;
use App\Models\Rekening;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Monolog\Handler\NullHandler;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $campaigns = Campaign::all(); // Ambil semua data campaign dari database
        return view('welcome', compact('campaigns'));
    }

    public function allCampaign()
    {
        $campaigns = Campaign::paginate(6); // Ambil semua data campaign dari database
        return view('home.campaign.index', compact('campaigns'));
    }

    public function search(Request $request)
    {
        $query = $request->input('q');
        $campaigns = Campaign::where('name', 'like', '%' . $query . '%')
            ->orWhere('description', 'like', '%' . $query . '%')
            ->paginate(6);
        if ($campaigns->isEmpty()) {
            return redirect()->route('all-campaign')->with('warning', 'Campaign tidak ditemukan!');
        } else {
            return view('home.campaign.index', compact('campaigns'));
        }
    }

    public function show(Campaign $campaign)
    {
        $campaign = Campaign::where('slug', $campaign->slug)->first();
        $donaturs = $campaign->donatur;
        return view('home.campaign.detail', compact('campaign', 'donaturs'));
    }

    public function form(Campaign $campaign)
    {
        $campaign = Campaign::where('slug', $campaign->slug)->first();
        $rekenings = Rekening::all();
        if (Auth::check()) {
            $user = Auth::user();
            return view('home.campaign.form', compact('campaign', 'rekenings', 'user'));
        } else {
            return view('home.campaign.form', compact('campaign', 'rekenings'));
        }
    }

    public function donate(Request $request, Campaign $campaign)
    {
        $campaign = Campaign::where('slug', $campaign->slug)->first();

        $request->validate([
            'metode_pembayaran' => 'required|exists:rekenings,id',
            'name' => 'nullable|string|max:255',
            'kategori' => 'required|in:internal,eksternal',
            'email' => 'nullable|email|max:255',
            'phone_no' => 'required|string|max:13|min:9',
            'amount' => 'required|numeric|min:10000|max:10000000',
            'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'message' => 'nullable|string|max:1000',
        ]);

        // Proses upload bukti pembayaran
        $file = $request->file('bukti_pembayaran');
        $ext = $file->getClientOriginalExtension();
        // Generate tanggal dan waktu upload sebagai nama file
        $uploadTime = date('YmdHis');
        $buktiPembayaranPath = $file->storeAs("Donasi/Bukti Pembayaran", $uploadTime . '_' . uniqid() . '.' . $ext, 'public');

        if ($request->input('name') == null) {
            $donatur_name =  '*****';
        } else {
            $donatur_name = $request->input('name');
        }

        if (Auth::check()) {
            // Jika ada pengguna yang login, gunakan ID pengguna yang login sebagai nilai user_id
            $user_id = Auth::id();
        } else {
            // Jika tidak ada pengguna yang login, set user_id menjadi null
            $user_id = null;
        }

        // Simpan data donatur ke database
        Donatur::create([
            'name' => $donatur_name,
            'kategori' => $request->input('kategori'),
            'email' => $request->input('email'),
            'phone_no' => $request->input('phone_no'),
            'campaign_id' => $campaign->id,
            'amount' => $request->input('amount'),
            'message' => $request->input('message'),
            'rekening_id' => $request->input('metode_pembayaran'),
            'payment_status' => 'pending', 
            'payment_date' => now(),
            'payment_proof' => $buktiPembayaranPath,
            'status' => 'unverified', // Atur status sesuai kebutuhan aplikasi Anda
            'verified_by' => null,
            'verified_at' => null,
            'user_id' => $user_id,
        ]);

        return redirect()->route('campaign.show', $campaign->slug)->with('success', 'Terima kasih telah berdonasi!, admin akan segera memverifikasi donasi Anda.');
    }
}
