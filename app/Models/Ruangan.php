<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'jumlah'];

    public function booking()
    {
        return $this->hasMany(Booking::class);
    }

    public function history()
    {
        return $this->hasMany(History::class);
    }
}
