<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konfirmasi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    // protected $with = ['pembayaran'];

    // /**
    //  * Get the pembayaran that owns the Konfirmasi
    //  *
    //  * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    //  */
    // public function pembayaran()
    // {
    //     return $this->belongsTo(Pembayaran::class);
    // }
}
