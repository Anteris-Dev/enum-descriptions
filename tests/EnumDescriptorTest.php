<?php

namespace AnterisDev\Tests\EnumDescriptions;

use AnterisDev\Tests\EnumDescriptions\Fakes\FakeBackedIntEnum;
use AnterisDev\Tests\EnumDescriptions\Fakes\FakeBackedStringEnum;
use AnterisDev\Tests\EnumDescriptions\Fakes\FakeEnum;
use PHPUnit\Framework\TestCase;

class EnumDescriptorTest extends TestCase
{
    public function test_it_can_get_descriptions_of_simple_enum(): void
    {
        $descriptions = enum_descriptions(FakeEnum::class);

        $this->assertEquals(
            [
                'WithDescription' => 'Some description for some enum.',
                'WithoutDescription' => 'Without description',
            ],
            $descriptions
        );
    }

    public function test_it_can_get_description_of_simple_enum_based_on_value(): void
    {
        $this->assertSame(
            enum_description(FakeEnum::WithDescription),
            'Some description for some enum.'
        );

        $this->assertSame(
            enum_description(FakeEnum::WithoutDescription),
            'Without description'
        );
    }

    public function test_it_can_get_descriptions_of_int_backed_enum(): void
    {
        $descriptions = enum_descriptions(FakeBackedIntEnum::class);

        $this->assertEquals(
            [
                0 => 'A described case.',
                1 => 'Without description',
            ],
            $descriptions
        );
    }

    public function test_it_can_get_description_of_int_backed_enum_based_on_value(): void
    {
        $this->assertEquals(
            'A described case.',
            enum_description(FakeBackedIntEnum::WithDescription)
        );

        $this->assertEquals(
            'Without description',
            enum_description(FakeBackedIntEnum::WithoutDescription)
        );
    }

    public function test_it_can_get_descriptions_of_string_backed_enum(): void
    {
        $descriptions = enum_descriptions(FakeBackedStringEnum::class);

        $this->assertEquals(
            [
                'value-1' => 'This describes the enum.',
                'this-does-not-have-a-description' => 'Without description',
            ],
            $descriptions
        );
    }

    public function test_it_can_get_description_of_string_backed_enum_based_on_value(): void
    {
        $this->assertSame(
            enum_description(FakeBackedStringEnum::WithDescription),
            'This describes the enum.'
        );

        $this->assertSame(
            enum_description(FakeBackedStringEnum::WithoutDescription),
            'Without description'
        );
    }
}
