<?php

namespace AnterisDev\EnumDescriptions\Descriptors;

use ReflectionEnum;
use UnexpectedValueException;

class EnumDescriptor
{
    private ReflectionEnum $enum;

    private array $descriptions = [];

    /** @var EnumCaseDescriptor[] */
    private array $cases = [];

    public function __construct(string $enum)
    {
        if (! enum_exists($enum)) {
            throw new UnexpectedValueException("Expecting enum, received [{$enum}].");
        }

        $this->enum = new ReflectionEnum($enum);

        $this->resolveCases();
    }

    public function description(string $value): string
    {
        return $this->descriptions[$value] ?? '';
    }

    public function descriptions(): array
    {
        return $this->descriptions;
    }

    public function reflection(): ReflectionEnum
    {
        return $this->enum;
    }

    private function resolveCases(): void
    {
        foreach ($this->enum->getCases() as $case) {
            $descriptor = new EnumCaseDescriptor($this, $case);

            $this->cases[$descriptor->value()] = $descriptor;
            $this->descriptions[$descriptor->value()] = $descriptor->description();
        }
    }
}
