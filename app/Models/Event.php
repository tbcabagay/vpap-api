<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    /**
     * @var string
     */
    protected $connection = 'mysql_vpap';

    /**
     * @var string
     */
    protected $table = 'event';

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    /**
     * @return HasMany
     */
    public function attendances(): HasMany
    {
        return $this->hasMany(Attendance::class);
    }

    /**
     * @return Attribute
     */
    public function startDate(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => Carbon::parse($value)->toFormattedDateString()
        );
    }

    public function endDate(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => Carbon::parse($value)->toFormattedDateString()
        );
    }
}
