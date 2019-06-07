<?php

namespace App\Http\Controllers;

use App\ModelCar;
use App\Resident;
use App\Sensor;
use Illuminate\Http\Request;

class SensorController extends Controller
{
    /**
     * Store a new user.
     *
     * @param  Request  $request
     * @return Response
     */

    public function index()
    {
        $sensors = Sensor::all();
        return response()->json($sensors);
    }

    public function show($id)
    {
        return Sensor::findOrFail($id);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'     => 'required',
            'description'   => 'required'
        ]);

        $sensor = new Sensor();

        $sensor->name = $request->name;
        $sensor->description = $request->description;


        $sensor->save();

        return response()->json($sensor, 201);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'     => 'required',
            'description'   => 'required'
        ]);

        $sensor = Sensor::find($id);

        if (!$sensor){
            return response()->json(['error' => 'not found'], 404);
        }

        $sensor->name = $request->name;
        $sensor->description = $request->description;


        $sensor->save();


        return response()->json($sensor, 201);
    }

    public function destroy($id)
    {
        $sensor = Sensor::find($id);

        if (!$sensor){
            return response()->json(['error' => 'not found'], 404);
        }

        $sensor->delete();

        return response()->json('sensor removed successfully');
    }
}
