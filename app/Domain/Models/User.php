<?php

declare(strict_types=1);

namespace App\Domain\Models;

class User extends BaseModel
{
    protected $table = "user";
    protected $fillable = [
        'name',
        'jobRole',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function refund()
    {
        return $this->hasMany(Refund::class, 'userId');
    }
}
