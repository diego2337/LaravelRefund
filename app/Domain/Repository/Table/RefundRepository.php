<?php

namespace Alvo\Domain\Repository\Table;

use Alvo\Domain\Model\Table\Refund;

class RefundRepository extends RepositoryAbstract
{
    public function model()
    {
        return Refund::class;
    }
}
