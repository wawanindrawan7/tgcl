<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function booking($id)
    {
        $data = json_decode($id, true);

        // Check if decoding was successful
        if ($data === null && json_last_error() !== JSON_ERROR_NONE) {
            // Handle JSON decoding error
            return null; // Or handle the error accordingly
        }

        // Check if 'jumlah' key exists in $data before accessing it
        if (array_key_exists('jumlah', $data)) {
            $kursi = Booking::where('jumlah', $data['jumlah'])->count();
            if ($kursi > 0) {
                return null;
            } else {
                return $id;
            }
        } else {
            // Handle the case where 'jumlah' key is not found in $data
            return null; // Or handle the error accordingly
        }
    }

    // public function booking()
    // {
    //     return $this->hasMany(Booking::class);
    // }

    public function history()
    {
        return $this->hasMany(History::class);
    }
}
