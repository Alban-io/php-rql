<?php

namespace r\Queries\Dates;

use r\ProtocolBuffer\TermTermType;
use r\ValuedQuery\ValuedQuery;

class Day extends ValuedQuery
{
    public function __construct(ValuedQuery $time)
    {
        $this->setPositionalArg(0, $time);
    }

    protected function getTermType(): int
    {
        return TermTermType::PB_DAY;
    }
}
