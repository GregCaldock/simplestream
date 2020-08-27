<?php


namespace App\Traits;


use Illuminate\Support\Str;

/**
 * Trait UsesUuid
 * Use uuid instead of simple id
 * @package App\Traits
 */
trait UsesUuid
{
    protected static function bootUsesUuid() {
        static::creating(function ($model) {
            if (! $model->getKey()) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }

    public function getIncrementing()
    {
        return false;
    }

    public function getKeyType()
    {
        return 'string';
    }
}
