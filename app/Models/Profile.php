<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    /**
     * @var string
     */
    protected $connection = 'mysql_vpap';

    /**
     * @var string
     */
    protected $table = 'user_profile';

    /**
     * @return Attribute
     */
    public function name(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes): string => sprintf('%s %s', $attributes['first_name'], $attributes['last_name']),
        )->shouldCache();
    }

    /**
     * @return Attribute
     */
    public function firstName(): Attribute
    {
        return Attribute::make(
            get: fn (string $value): string => ucwords(strtolower($value))
        )->shouldCache();
    }

    /**
     * @return Attribute
     */
    public function middleName(): Attribute
    {
        return Attribute::make(
            get: fn (?string $value): ?string => $value ? ucwords(strtolower($value)) : null
        )->shouldCache();
    }

    /**
     * @return Attribute
     */
    public function lastName(): Attribute
    {
        return Attribute::make(
            get: fn (string $value): string => ucwords(strtolower($value))
        )->shouldCache();
    }
}
