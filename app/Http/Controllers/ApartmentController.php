<?php

namespace App\Http\Controllers;

use App\Apartment;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    /**
     * Store a new user.
     *
     * @param  Request  $request
     * @return Response
     */

    public function index()
    {
        $apartments = Apartment::all();
        return response()->json($apartments);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'number'     => 'required',
            'floor'      => 'required',
        ]);

        $apartment = new Apartment();

        $apartment->number = $request->number;
        $apartment->floor = $request->floor;

        $apartment->save();

        return response()->json($apartment, 201);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'number'     => 'required',
            'floor'      => 'required',
        ]);

        $apartment = Apartment::find($id);

        if (!$apartment){
            return response()->json(['error' => 'not found'], 404);
        }


        $apartment->number = $request->number;
        $apartment->floor = $request->floor;

        $apartment->save();
        return response()->json($apartment, 201);
    }

    public function destroy($id)
    {
        $apartment = Apartment::find($id);

        if (!$apartment){
            return response()->json(['error' => 'not found'], 404);
        }

        $apartment->delete();

        return response()->json('apartamento removed successfully');
    }
}
