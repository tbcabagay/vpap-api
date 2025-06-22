<?php

namespace App\Http\Controllers;

use App\Http\Resources\EventResource;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function show(int $id): EventResource
    {
        return new EventResource($this->getEvent($id));
    }

    public function latest(): EventResource
    {
        return new EventResource($this->getEvent(env('VPAP_EVENT_ID')));
    }

    protected function getEvent(int $id): Event
    {
        return Event::where('id', $id)
            ->with(['attendances' => function ($query) {
                $query->with(['member' => function ($query) {
                    $query->with(['profile', 'profession']);
                }]);
            }])->firstOrFail();
    }
}
