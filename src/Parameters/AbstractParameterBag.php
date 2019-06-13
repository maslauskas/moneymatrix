<?php

namespace Maslauskas\MoneyMatrix\Parameters;

use Symfony\Component\HttpFoundation\ParameterBag;

abstract class AbstractParameterBag extends ParameterBag
{
    /**
     * @return array
     */
    abstract public function toArray(): array;

    /**
     * @return array
     */
    abstract public function getSignatureParams(): array;
}
