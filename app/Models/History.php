<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class History extends Model
{
    use HasFactory;
    protected $table = "histories";
    protected $fillable = ['title', 'category', 'start_date', 'end_date', 'info1', 'info2', 'info3', 'containt'];

    protected $appends = ['start_date_id', 'end_date_id'];

    public function getStartDateIDAttribute()
    {
        return Carbon::parse($this->attributes['start_date'])->translatedFormat('d F Y');
    }

    public function getEndDateIDAttribute()
    {
        if ($this->attributes['end_date']) {
            return Carbon::parse($this->attributes['end_date'])->translatedFormat('d F Y');
        } else {
            return 'Sekarang';
        }
    }
}
