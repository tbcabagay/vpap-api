<?php

use App\Models\Event;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    DB::connection('mysql_vpap')->enableQueryLog();

    \App\Models\Event::query()
        ->where('id', 1)
        ->with(['attendances' => function ($query) {
            $query->with(['member' => function ($query) {
                $query->with('profile');
            }]);
        }])
        ->get();

    dd(DB::connection('mysql_vpap')->getQueryLog());
});
