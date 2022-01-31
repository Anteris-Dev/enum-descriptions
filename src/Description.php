<?php

namespace AnterisDev\EnumDescriptions;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS_CONSTANT)]
class Description
{
    public function __construct(public readonly string $description)
    {
        //
    }
}
