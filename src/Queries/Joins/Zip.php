<?php

namespace r\Queries\Joins;

use r\ProtocolBuffer\TermTermType;
use r\ValuedQuery\ValuedQuery;

class Zip extends ValuedQuery
{
    public function __construct(ValuedQuery $sequence)
    {
        $this->setPositionalArg(0, $sequence);
    }

    protected function getTermType(): int
    {
        return TermTermType::PB_ZIP;
    }
}
