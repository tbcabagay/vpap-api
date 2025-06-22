<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
    /**
     * @var string
     */
    protected $connection = 'mysql_vpap';

    /**
     * @var string
     */
    protected $table = 'user_profession';
}
