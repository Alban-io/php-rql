<?php

namespace r\Queries\Dates;

use r\ProtocolBuffer\TermTermType;
use r\ValuedQuery\ValuedQuery;

class Monday extends ValuedQuery
{
    protected function getTermType(): int
    {
        return TermTermType::PB_MONDAY;
    }
}
