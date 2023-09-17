<?php

namespace App\Models;

use App\Models\Code;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Acte extends Model
{
    use HasFactory;

    public function codes():HasMany{

        return $this->hasMany(Code::class);
        
    }
}
