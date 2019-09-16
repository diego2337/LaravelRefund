<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;

class Refund extends Model
{
    use SoftDeletes;
    
    public function usario()
    {
        return $this->belongsTo('App\Usuario', 'userId');
    }
}
