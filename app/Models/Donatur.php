<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donatur extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'kategori',
        'email',
        'phone_no',
        'campaign_id',
        'amount',
        'message',
        'rekening_id',
        'payment_status',
        'payment_date',
        'payment_proof',
        'status',
        'verified_by',
        'verified_at',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }

    public function rekening()
    {
        return $this->belongsTo(Rekening::class);
    }
    
    public function diffUpdateAtForHumans()
    {
        return Carbon::parse($this->updated_at)->diffForHumans();
    }
}
