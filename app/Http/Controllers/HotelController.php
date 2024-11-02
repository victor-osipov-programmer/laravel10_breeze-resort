<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Http\Requests\StoreHotelRequest;
use App\Http\Requests\UpdateHotelRequest;
use App\Http\Resources\HotelResource;
use App\Http\Resources\UsersInRoomsInHotel;
use App\Models\Room;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hotels = Hotel::all();

        return HotelResource::collection($hotels);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHotelRequest $request)
    {
        $data = $request->validated();

        $new_hotel = Hotel::create($data);

        return response([
            'data' => [
                'id' => $new_hotel->id,
                'name' => $new_hotel->name,
                'number' => $new_hotel->number,
            ]
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Hotel $hotel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHotelRequest $request, Hotel $hotel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hotel $hotel)
    {
        $hotel->delete();

        return [
            'data' => [
                'message' => 'Deleted'
            ]
        ];
    }
    public function add_room(Hotel $hotel, Room $room)
    {
        $room->update([
            'hotel_id' => $hotel->id
        ]);

        return [
            'data' => [
                'name' => $room->name,
                'title' => $room->desc_data,
            ]
        ];
    }

    function roomsinhotels() {
        $hotels = Hotel::with('rooms.users')->get();

        return UsersInRoomsInHotel::collection($hotels);
    }
}
