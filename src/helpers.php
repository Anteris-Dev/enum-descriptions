<?php

use AnterisDev\EnumDescriptions\Descriptors\EnumDescriptor;

if (! function_exists('enum_descriptor')) {
    function enum_descriptor(string $enum): EnumDescriptor
    {
        return new EnumDescriptor($enum);
    }
}

if (! function_exists('enum_descriptions')) {
    function enum_descriptions(string $enum): array
    {
        return (new EnumDescriptor($enum))->descriptions();
    }
}

if (! function_exists('enum_description')) {
    function enum_description(UnitEnum $enum): string
    {
        return (new EnumDescriptor($enum::class))->description($enum->value ?? $enum->name);
    }
}
