<?php

namespace AnterisDev\Tests\EnumDescriptions\Fakes;

use AnterisDev\EnumDescriptions\Description;

enum FakeBackedStringEnum: string
{
    #[Description('This describes the enum.')]
    case WithDescription = 'value-1';

    case WithoutDescription = 'this-does-not-have-a-description';
}
