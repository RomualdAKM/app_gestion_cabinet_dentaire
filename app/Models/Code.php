<?php

namespace App\Models;

use App\Models\Acte;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Code extends Model
{
    use HasFactory;

    public function acte():BelongsTo{

        return $this->belongsTo(Acte::class);
        
    }
}
