<?php

namespace App\Http\Controllers;

use App\Event;
use Calendar;

use Illuminate\Http\Request;
use App\Http\Requests\EventRequest;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = [];
        $data = Event::all();
        if($data->count()) {
            foreach ($data as $key => $value) {
                $events[] = Calendar::event(
                    $value->title,
                    true,
                    new \DateTime($value->start_date),
                    new \DateTime($value->end_date.' +1 day'),
                    null,
                    // Add color and link on event
                    [
                        'color' => '#0fc',
                        'url' => 'pass here url and any route',
                    ]
                );
            }
        }
        $calendar = Calendar::addEvents($events);
      return view('calender.calender', compact('calendar'));    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function getEvent()
    {
        return Event::orderby('created_at', 'desc')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $calendar = new Event;
        $calendar->start_time = $request->startTime;
        $calendar->end_time = $request->endTime;
        $calendar->start_date = $request->start_date;
        $calendar->end_date = $request->start_date;
        $calendar->title = $request->title;
        $calendar->user_id = Auth::id();
        $calendar->save();
        return $calendar;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(EventRequest $request, Event $event)
    {
        $calendar = Event::find($request->id);
        $calendar->start_time = $request->startTime;
        $calendar->end_time = $request->endTime;
        $calendar->start_date = $request->start_date;
        $calendar->end_date = $request->start_date;
        $calendar->title = $request->title;
        $calendar->save();
        return $calendar;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event, Request $request)
    {
        Event::where('id', $event->id)->delete();
        // return $request->all();
    }
}