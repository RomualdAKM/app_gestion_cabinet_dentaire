<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Client;
use App\Models\ItemDevi;

class Devi extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function client():BelongsTo{

        return $this->belongsTo(Client::class);

    }
    public function item_devis():HasMany{

        return $this->hasMany(ItemDevi::class);

    }
}
