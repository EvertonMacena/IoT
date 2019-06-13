<?php

namespace App\Http\Controllers;

use App\Resident;
use Illuminate\Http\Request;

class ResidentController extends Controller
{
    /**
     * Store a new user.
     *
     * @param  Request  $request
     * @return Response
     */

    public function index()
    {
        $residents = Resident::with('apartment')->get();
        return response()->json($residents);
    }

    public function show($id)
    {
        $apartment = Resident::where('id', $id)->with('apartment')->firstOrFail();
        return response()->json($apartment);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email'     => 'required|email|unique:residents',
            'name'      => 'required',
            'contact'   => 'required',
            'apartment_id' => 'required'
        ]);

        $resident = new Resident();

        $resident->name = $request->name;
        $resident->lastname = $request->lastname ? $request->lastname : null;
        $resident->email = $request->email;
        $resident->contact = $request->contact;
        $resident->apartment_id = $request->apartment_id;
        $resident->user_id = $request->user_id;

        $resident->save();

        return response()->json($resident, 201);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'email'     => 'required|email|unique:users',
            'name'      => 'required',
            'contact'   => 'required',
            'apartment_id' => 'required'
        ]);

        $resident = Resident::find($id);

        if (!$resident){
            return response()->json(['error' => 'not found'], 404);
        }

        $resident->name = $request->name;
        $resident->lastname = $request->lastname ? $request->lastname : null;
        $resident->email = $request->email;
        $resident->contact = $request->contact;
        $resident->apartment_id = $request->apartment_id;
        $resident->user_id = $request->user_id;

        $resident->save();

        return response()->json($resident, 201);
    }

    public function destroy($id)
    {
        $resident = Resident::find($id);

        if (!$resident){
            return response()->json(['error' => 'not found'], 404);
        }

        $resident->delete();

        return response()->json('resident removed successfully');
    }
}
