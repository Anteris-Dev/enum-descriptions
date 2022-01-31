<?php

namespace AnterisDev\Tests\EnumDescriptions;

use AnterisDev\EnumDescriptions\Descriptors\EnumDescriptor;
use AnterisDev\Tests\EnumDescriptions\Fakes\FakeEnum;
use PHPUnit\Framework\TestCase;

class HelpersTest extends TestCase
{
    public function test_enum_descriptor_returns_descriptor(): void
    {
        $this->assertEquals(
            new EnumDescriptor(FakeEnum::class),
            enum_descriptor(FakeEnum::class)
        );
    }

    public function test_enum_descriptions_returns_descriptions(): void
    {
        $this->assertEquals(
            [
                'WithDescription' => 'Some description for some enum.',
                'WithoutDescription' => 'Without description',
            ],
            enum_descriptions(FakeEnum::class)
        );
    }

    public function test_enum_description_returns_description(): void
    {
        $this->assertEquals(
            'Some description for some enum.',
            enum_description(FakeEnum::WithDescription)
        );
    }
}
