<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Http\Resources\RoomResource;
use App\Http\Resources\UsersInRoom;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Room::all();

        return RoomResource::collection($posts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoomRequest $request)
    {
        $data = $request->validated();

        $new_room = Room::create($data);

        return [
            'data' => [
                'message' => 'Created'
            ]
        ];
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoomRequest $request, Room $room)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        $room->delete();

        return [
            'data' => [
                'message' => 'Deleted'
            ]
        ];
    }

    function usersinroom(Request $request)
    {
        $rooms = Room::with('users')->get();

        return UsersInRoom::collection($rooms);
    }
}
