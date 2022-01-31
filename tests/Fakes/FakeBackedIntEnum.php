<?php

namespace AnterisDev\Tests\EnumDescriptions\Fakes;

use AnterisDev\EnumDescriptions\Description;

enum FakeBackedIntEnum: int
{
    #[Description('A described case.')]
    case WithDescription = 0;
    case WithoutDescription = 1;
}
