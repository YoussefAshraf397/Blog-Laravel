<?php

namespace App\Enums;

use ReflectionClass;

abstract class AbstractEnum
{
    private $value;

    public function __construct($value)
    {
        if (!in_array($value, $this->getValues())) {
            dump($value);
            dd($this->getValue());
        }
        $this->value = $value;
    }

    public static function getValues(): array
    {
        $reflectionClass = new ReflectionClass(get_called_class());

        return array_values($reflectionClass->getConstants());
    }

    public static function getConstants(): array
    {
        $reflectionClass = new ReflectionClass(get_called_class());

        return array_keys($reflectionClass->getConstants());
    }

    public function getValue()
    {
        return $this->value;
    }

    public function __toString()
    {
        return $this->value;
    }
}
