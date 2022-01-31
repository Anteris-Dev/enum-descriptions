<?php

namespace AnterisDev\Tests\EnumDescriptions\Fakes;

use AnterisDev\EnumDescriptions\Description;

enum FakeEnum
{
    #[Description('Some description for some enum.')]
    case WithDescription;

    case WithoutDescription;
}
