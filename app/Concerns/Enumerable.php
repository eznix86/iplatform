<?php

declare(strict_types=1);

namespace App\Concerns;

trait Enumerable
{
    /**
     * Get text description of the enum value.
     */
    public function description(): string
    {
        return trans($this->toTranslatableString());
    }

    public function toTranslatableString(): string
    {
        return (new \ReflectionClass(self::class))->getShortName().'.'.$this->value;
    }

    /**
     * Get the Enum as select array for UI.
     */
    public static function asSelectArray(): array
    {
        $options = [];

        foreach (self::cases() as $case) {
            $options[$case->value] = $case->description();
        }

        return $options;
    }
}
