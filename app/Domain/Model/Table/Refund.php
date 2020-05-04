<?php

namespace Alvo\Domain\Model\Table;

class Refund extends ModelAbstract
{
    protected $fillable = [
        'tipo',
        'descricao',
        'data',
        'valor',
        'usuario_id',
    ];

    public function rules()
    {
        return [
            'tipo' => 'required',
            'descricao' => 'required',
            'data' => 'nullable',
            'valor' => 'required',
            'usuario_id' => 'required',
        ];
    }

    public function user()
    {
        return $this->belongsTo(Refund::class, 'usuario_id', 'id');
    }
}
