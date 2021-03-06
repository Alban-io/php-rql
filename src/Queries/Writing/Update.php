<?php

namespace r\Queries\Writing;

use r\Exceptions\RqlDriverError;
use r\ProtocolBuffer\TermTermType;
use r\Query;
use r\ValuedQuery\Json;
use r\ValuedQuery\ValuedQuery;

class Update extends ValuedQuery
{
    public function __construct(ValuedQuery $selection, $delta, array $opts = [])
    {
        if (!$delta instanceof Query) {
            try {
                $json = $this->tryEncodeAsJson($delta);
                if (false !== $json) {
                    $delta = new Json($json);
                } else {
                    $delta = $this->nativeToDatum($delta);
                }
            } catch (RqlDriverError $e) {
                $delta = $this->nativeToFunction($delta);
            }
        }

        $this->setPositionalArg(0, $selection);
        $this->setPositionalArg(1, $this->wrapImplicitVar($delta));
        foreach ($opts as $opt => $val) {
            $this->setOptionalArg($opt, $this->nativeToDatum($val));
        }
    }

    protected function getTermType(): int
    {
        return TermTermType::PB_UPDATE;
    }
}
