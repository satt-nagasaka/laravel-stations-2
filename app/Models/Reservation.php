<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Schedule;
use App\Models\Sheet;
use App\Models\Screen;
use App\Models\Movie;

class Reservation extends Model
{
    use HasFactory;

    
    protected $fillable = ['date','schedule_id','sheet_id','email','name','is_canceled','created_at','updated_at'];

    public function schedule() {
        return $this->belongsTo(Schedule::class);
    }

    public function sheet() {
        return $this->belongsTo(Sheet::class,'sheet_id','id');
    }
    public function screen() {
        return $this->belongsToMany(Screen::class);
    }
    public function movie() {
        return $this->belongsToMany(Movie::class);
    }
}
