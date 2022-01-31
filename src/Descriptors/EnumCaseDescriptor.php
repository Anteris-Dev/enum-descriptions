<?php

namespace AnterisDev\EnumDescriptions\Descriptors;

use AnterisDev\EnumDescriptions\Description;
use ReflectionEnumPureCase;
use ReflectionEnumUnitCase;

class EnumCaseDescriptor
{
    private array $attributes = [];

    private string $description;

    public function __construct(private EnumDescriptor $enum, private ReflectionEnumPureCase|ReflectionEnumUnitCase $case)
    {
        $this->resolveAttributes();
        $this->resolveDescription();
    }

    /**
     * @return array<array-key, object>
     */
    public function attributes(): array
    {
        return array_values($this->attributes);
    }

    /**
     * @template RequestedAttribute
     *
     * @param class-string<RequestedAttribute> $name
     * @return RequestedAttribute|null
     */
    public function attribute(string $name): ?object
    {
        return $this->attributes[$name] ?? null;
    }

    public function name(): string
    {
        return $this->case->getName();
    }

    public function description(): string
    {
        return $this->description;
    }

    public function value(): string
    {
        return ($this->enum->reflection()->isBacked())
            ? $this->case->getBackingValue()
            : $this->case->getName();
    }

    private function resolveAttributes(): void
    {
        foreach ($this->case->getAttributes() as $attribute) {
            $this->attributes[$attribute->getName()] = $attribute->newInstance();
        }
    }

    private function resolveDescription(): void
    {
        $description = $this->attribute(Description::class)?->description;

        if (! $description) {
            $description = ucfirst(
                strtolower(
                    trim(
                        join(' ', preg_split('/(?=[A-Z])/', $this->name()))
                    )
                )
            );
        }

        $this->description = $description;
    }
}
