<?php

namespace AnterisDev\EnumDescriptions;

use Attribute;

#[Attribute]
class Description
{
    public function __construct(public readonly string $description)
    {
        //
    }
}
