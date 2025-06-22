<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attendance extends Model
{
    /**
     * @var string
     */
    protected $connection = 'mysql_vpap';

    /**
     * @var string
     */
    protected $table = 'event_attendance';

    protected $casts = [
        'payment_confirmed' => 'boolean',
        'attended' => 'boolean',
    ];

    /**
     * @return BelongsTo
     */
    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class, 'member_id');
    }

    /**
     * @return Attribute
     */
    public function paymentConfirmed(): Attribute
    {
        return Attribute::make(
            get: fn (bool $value): string => $value ? 'yes' : 'no'
        );
    }

    /**
     * @return Attribute
     */
    public function attended(): Attribute
    {
        return Attribute::make(
            get: fn (bool $value): string => $value ? 'yes' : 'no'
        );
    }
}
