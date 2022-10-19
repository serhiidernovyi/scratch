<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\TransformsRequest;

class BooleanParameter extends TransformsRequest
{
    /**
     * Transform the given value.
     *
     * @param  string  $key
     * @param  mixed  $value
     * @return mixed
     */
    protected function transform($key, $value)
    {
        $is_boolean = is_string($value) && in_array($value, ['true', 'false']);

        if (!$is_boolean) {
            return $value;
        }
        return $value === 'true';
    }
}
