<?php

namespace App\Http\Controllers;

use App\Models\Attendee;
use App\Models\Attendee_Event;
use App\Models\Event;
use App\Models\Picture;
use Illuminate\Http\Request;

class AttendeeController extends Controller
{
    public function index()//
    {
        $attend = auth()->user()->attendee;

        if ($attend != null) {
            EventController::updateEventStatus();
            $attendeeId = $attend->id;
            $events = Event::where('status', 'active')
                ->whereDoesntHave('attendees', function ($query) use ($attendeeId) {
                    $query->where('attendee_id', $attendeeId);
                })->latest()
                ->get();

            $joinedEvents = Event::whereHas('attendees', function ($query) use ($attendeeId) {
                $query->where('attendee_id', $attendeeId);
            })
                ->where('status', 'active')->latest()
                ->get();
            $completedEvents = Event::whereHas('attendees', function ($query) use ($attendeeId) {
                $query->where('attendee_id', $attendeeId);
            })
                ->where('status', 'completed')->latest()
                ->get();

            $pic = Picture::where('user_id', auth()->user()->id)->first();

            return view("attendee/dashboard", compact(['events', 'joinedEvents', 'completedEvents', 'pic']));
        }

        return view("attendee/dashboard");
    }

    public function create(Request $request)//
    {
        $data = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone_no' => $request->phone_no,
            'bio' => $request->bio,
            'address' => $request->address,
            'user_id' => auth()->user()->id
        ];

        $model = new Attendee;
        $model->fill($data);
        $model->save();

        return redirect('attendee/dashboard');
    }
    public function update(Request $request)//
    {
        $data = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone_no' => $request->phone_no,
            'address' => $request->address,
            'bio' => $request->bio,


        ];

        auth()->user()->attendee->update($data);

        return redirect('attendee/dashboard');
    }

   
}
