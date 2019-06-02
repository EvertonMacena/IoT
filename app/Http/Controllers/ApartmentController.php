<?php

namespace App\Http\Controllers;

use App\Apartment;
use App\Sensor;
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

    public function show($id)
    {
        $sensor = Apartment::where('id', $id)->with('sensors')->firstOrFail();
        return response()->json($sensor);
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

        $apartment->sensors()->dettach();

        $apartment->delete();

        return response()->json('apartamento removed successfully');
    }

    public function addSensor(Request $request, $id)
    {
        $apartment = Apartment::find($id);
        $sensor = Sensor::find($request->input('sensor_id'));

        if (!$apartment || !$sensor){
            return response()->json(['error' => 'not found'], 404);
        }

        $apartment->sensors()->attach($sensor->id, ['is_on' => $request->input('is_on')]);

        return response()->json($sensor->name.' add in apartment '. $apartment->number, 200);

    }

    public function updateSensor(Request $request, $id)
    {
        $apartment = Apartment::find($id);
        $sensor = Sensor::find($request->input('sensor_id'));

        if (!$apartment || !$sensor){
            return response()->json(['error' => 'not found'], 404);
        }

        $apartment->sensors()->updateExistingPivot($sensor->id, ['is_on' => $request->input('is_on')]);

        return response()->json($sensor->name.' in apartment '
            .$apartment->number.' update with success for '. $request->input('is_on'));
    }

    public function removeSensor($sensorId, $apartmentId)
    {
        $apartment= Apartment::find($apartmentId);
        $sensor = Sensor::find($sensorId);

        if(!$apartment || !$sensor) {
            return response()->json(['error' => 'not found'], 404);
        }

        $apartment->sensors()->dettach($sensor->id);

        return response()->json($sensor->name.' removed in apartment '. $apartment->number, 200);

    }
}
