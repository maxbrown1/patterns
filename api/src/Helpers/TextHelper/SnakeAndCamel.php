<?php

declare(strict_types=1);

namespace App\Helpers\TextHelper;

class SnakeAndCamel
{
    public static function camelToSnake($input): string
    {
        return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $input));
    }

    public static function snakeToCamel($input): string
    {
        return lcfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', $input))));
    }
}
