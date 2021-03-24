<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\CreateEvent;

class CreateEventController extends Controller
{
    public function show_all () {
        $users = CreateEvent::with('dataEventRelation')->get();
        return response()->json($users);
    }

    public function show_event ($id) {
        $users = CreateEvent::with('dataEventRelation')->where('user_id', '=', $id)->get();
        return response()->json($users);
    }

    public function create_event (Request $request, $id) {
        $users = new CreateEvent([
            'user_id' => intval($id),
            'title' => $request -> get('title'),
            'content' => $request -> get('content'),
            'myimage' => $request -> file('myimage')->store('/myimage', 'public'),
            'latitude' => $request -> get('latitude'),
            'longitude' => $request -> get('longitude'),
            'date_create' => date('d/m/Y H:i:s')
        ]);
        $users->save();
        return response() -> json('success');
        return response() -> json($users);   
    }

    public function delete_event ($id) {
        $users = CreateEvent::find($id);
        $users->delete();
        return response()->json('success');
    }
}
