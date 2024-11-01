<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Room;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    function create_admin(Request $request)
    {
        $data = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        $user = User::create($data);

        return [
            'data' => [
                'message' => 'Administrator created'
            ]
        ];
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();

        $new_user = User::create($data);

        return response([
            'data' => [
                'message' => 'Created'
            ]
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->validated();

        $user->update($data);

        return [
            'data' => [
                'id' => $user->id,
                'message' => 'Updated'
            ]
        ];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return response([
            'data' => [
                'message' => 'Deleted'
            ]
        ]);
    }

    function change_room(Request $request, Room $room, User $user)
    {
        $user->update([
            'id_childdata' => $room->id
        ]);

        return response([
            'data' => [
                'message' => 'Changed'
            ]
        ]);
    }
    
}
