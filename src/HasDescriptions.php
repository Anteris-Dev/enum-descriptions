<?php

namespace AnterisDev\EnumDescriptions;

use AnterisDev\EnumDescriptions\Descriptors\EnumDescriptor;

trait HasDescriptions
{
    public static function descriptions(): array
    {
        return (new EnumDescriptor(static::class))->descriptions();
    }

    public function description(): string
    {
        return (new EnumDescriptor(static::class))->description($this->value ?? $this->name);
    }
}
