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


    /**
     * Get the user that owns the campaign.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Accessor for percentage of donation achieved.
     *
     * @return float
     */
    public function getDonationPercentageAttribute()
    {
        return ($this->raised / $this->goal) * 100;
    }

    /**
     * Accessor for formatted start date.
     *
     * @param string $value
     * @return string
     */
    public function getFormattedStartDateAttribute()
    {
        return Carbon::parse($this->start_date)->translatedFormat('d-m-Y H:i:s');
    }

    /**
     * Accessor for formatted end date.
     *
     * @param string $value
     * @return string
     */
    public function getFormattedEndDateAttribute()
    {
        return Carbon::parse($this->end_date)->translatedFormat('d-m-Y H:i:s');
    }

    /**
     * Accessor for formatted created_at attribute.
     *
     * @param string $value
     * @return string
     */
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
