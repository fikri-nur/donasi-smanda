<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Campaign extends Model
{
    use HasFactory;
    use HasSlug;

    protected $guarded = ['id'];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')  // Field yang akan digunakan untuk membuat slug
            ->saveSlugsTo('slug');       // Nama field dalam tabel untuk menyimpan slug
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function donatur()
    {
        return $this->hasMany(Donatur::class);
    }

    public function getFormattedGoalAttribute()
    {
        return number_format($this->goal, 0, ',', '.');
    }

    public function getTotalDonation()
    {
        return number_format(
            $this->donatur()
                ->where('payment_status', 'paid')
                ->where('status', 'verified')
                ->sum('amount'),
            0,
            ',',
            '.'
        );
    }

    public function getDonationPercentageAttribute()
    {
        $totalDonation = $this->donatur()
            ->where('payment_status', 'paid')
            ->where('status', 'verified')
            ->sum('amount');

        return ($totalDonation / $this->goal) * 100;
    }

    public function countTotalDonatur()
    {
        return $this->donatur()
            ->where('payment_status', 'paid')
            ->where('status', 'verified')
            ->count();
    }


    public function getFormattedStartDateAttribute()
    {
        return Carbon::parse($this->start_date)->translatedFormat('d-m-Y, H:i:s');
    }

    public function getFormattedEndDateAttribute()
    {
        return Carbon::parse($this->end_date)->translatedFormat('d-m-Y, H:i:s');
    }

    public function getRemainingDaysAttribute()
    {
        return Carbon::parse($this->end_date)->diffInDays();
    }

    public function getFormattedCreatedAtAttribute()
    {
        return Carbon::parse($this->created_at)->translatedFormat('d-m-Y, H:i:s');
    }

    public function getFormattedUpdatedAtAttribute()
    {
        return Carbon::parse($this->updated_at)->translatedFormat('d-m-Y, H:i:s');
    }

    public function diffCreatedAtForHumans()
    {
        return Carbon::parse($this->created_at)->diffForHumans();
    }
}
