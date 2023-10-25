<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekening extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_bank',
        'nama_pemilik',
        'nomor_rekening',
        'logo_bank',
        'logo_qr',
    ];

    public function donatur()
    {
        return $this->hasMany(Donatur::class);
    }

    // public function getLogoBankAttribute($value)
    // {
    //     return asset('storage/' . $value);
    // }

    // public function getLogoQrAttribute($value)
    // {
    //     return asset('storage/' . $value);
    // }

    // public function setLogoBankAttribute($value)
    // {
    //     $this->attributes['logo_bank'] = $value->store('images', 'public');
    // }

    // public function setLogoQrAttribute($value)
    // {
    //     $this->attributes['logo_qr'] = $value->store('images', 'public');
    // }

    public function scopeSearch($query, $val)
    {
        return $query->where('nama_bank', 'like', '%' . $val . '%')
            ->orWhere('nama_pemilik', 'like', '%' . $val . '%')
            ->orWhere('nomor_rekening', 'like', '%' . $val . '%');
    }

    public function scopeSort($query, $val)
    {
        if ($val == 'terbaru') {
            return $query->orderBy('created_at', 'desc');
        } elseif ($val == 'terlama') {
            return $query->orderBy('created_at', 'asc');
        } elseif ($val == 'nama_bank_az') {
            return $query->orderBy('nama_bank', 'asc');
        } elseif ($val == 'nama_bank_za') {
            return $query->orderBy('nama_bank', 'desc');
        } elseif ($val == 'nama_pemilik_az') {
            return $query->orderBy('nama_pemilik', 'asc');
        } elseif ($val == 'nama_pemilik_za') {
            return $query->orderBy('nama_pemilik', 'desc');
        } elseif ($val == 'nomor_rekening_az') {
            return $query->orderBy('nomor_rekening', 'asc');
        } elseif ($val == 'nomor_rekening_za') {
            return $query->orderBy('nomor_rekening', 'desc');
        } else {
            return $query->orderBy('created_at', 'desc');
        }
    }

    public function getFormattedCreatedAtAttribute()
    {
        return Carbon::parse($this->created_at)->translatedFormat('d-m-Y, H:i:s');
    }

    public function getFormattedUpdatedAtAttribute()
    {
        return Carbon::parse($this->updated_at)->translatedFormat('d-m-Y, H:i:s');
    }
}
