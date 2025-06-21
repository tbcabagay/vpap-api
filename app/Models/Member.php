<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Member extends Model
{
    /**
     * @var string
     */
    protected $connection = 'mysql_vpap';

    /**
     * @var string
     */
    protected $table = 'user';

    /**
     * @return HasOne
     */
    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class, 'user_id', 'id');
    }
}
