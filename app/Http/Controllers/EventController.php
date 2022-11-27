<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;
use App\Models\Report;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



class EventController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Event::whereDate('start', '>=', $request->start ) //where('user_id', '=', '')
                ->whereDate('end', '<=', $request->end)
                ->get(['id', 'title', 'start', 'end']);

            return response()->json($data);
        }

        return view('components.calendar.index');
    }

    public function list()
    {
        $events = Event::all();
        return view('components.layout-user.event', ["events" => $events]);
    }

    public function ajax(Request $request)
    {

        switch ($request->type) {
           case 'add':
              $event = Event::create([
                  'title' => $request->title,
                  'start' => $request->start,
                  'end' => $request->end,
              ]);

              return response()->json($event);
             break;

           case 'update':
              $event = Event::find($request->id)->update([
                  'title' => $request->title,
                  'start' => $request->start,
                  'end' => $request->end,
              ]);

              return response()->json($event);
             break;

           case 'delete':
              $event = Event::find($request->id)->delete();

              return response()->json($event);
             break;

           default:
             break;
        }
    }

    public function listHome()
    {
        $id = Auth::id();
        $events = DB::table('events')
                ->where('start', now()
                )->get();

        return view('admin.home', [
            "events" => $events,
            "reports" => Report::where('responsable', $id)->get()
        ]);
    }
}
