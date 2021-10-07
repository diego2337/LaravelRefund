<?php

declare(strict_types=1);

namespace App\Domain\Models;

class Refund extends BaseModel
{
    protected $table = "refund";

    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }
}
