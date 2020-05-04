<?php

namespace Alvo\Domain\Model\Table;

class User extends ModelAbstract
{
    public $table = 'usuarios';

    protected $fillable = [
        'nome',
        'funcao',
    ];

    public function rules()
    {
        return [
            'nome' => 'required',
            'funcao' => 'required',
        ];
    }

    public function refund()
    {
        return $this->hasMany(Refund::class, 'usuario_id', 'id');
    }
}
