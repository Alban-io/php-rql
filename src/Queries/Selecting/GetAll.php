<?php

namespace r\Queries\Selecting;

use r\ProtocolBuffer\TermTermType;
use r\Queries\Tables\Table;
use r\ValuedQuery\ValuedQuery;

class GetAll extends ValuedQuery
{
    public function __construct(Table $table, ...$keysAndOpts)
    {
        $this->setPositionalArg(0, $table);

        foreach ($keysAndOpts as $k => $v) {
            if (!is_array($v)) {
                $this->setPositionalArg($k+1, $this->nativeToDatum($v));
            } else {
                foreach ($v as $optKey => $optValue) {
                    $this->setOptionalArg($optKey, $this->nativeToDatum($optValue));
                }
            }
        }
    }

    protected function getTermType(): int
    {
        return TermTermType::PB_GET_ALL;
    }
}
