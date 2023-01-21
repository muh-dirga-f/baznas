<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    // protected $with =['konfirmasi'];

    public function konfirmasi()
    {
        return $this->belongsTo(Konfirmasi::class, 'id');
    }
}
