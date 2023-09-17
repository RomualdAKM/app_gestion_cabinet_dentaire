<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Acte;
use App\Models\Code;


class ItemFacture extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function acte():BelongsTo{

        return $this->belongsTo(Acte::class);

    }


    public function code():BelongsTo{

        return $this->belongsTo(Code::class);

    }
}
