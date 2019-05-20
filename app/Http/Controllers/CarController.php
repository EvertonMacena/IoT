<?php

namespace App\Http\Controllers;

use App\Car;
use App\Resident;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Store a new user.
     *
     * @param  Request  $request
     * @return Response
     */

    public function index()
    {
        $cars = Car::all();
        return response()->json($cars);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'board'     => 'required|unique:cars',
            'resident_id'   => 'required'
        ]);

        $car = new Resident();

        $car->board = $request->board;
        $car->model = $request->model ? $request->model : null;
        $car->resident_id = $request->resident_id;


        $car->save();

        return response()->json($car, 201);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'board'     => 'required|unique:cars',
            'resident_id'   => 'required'
        ]);

        $car = Car::find($id);

        if (!$car){
            return response()->json(['error' => 'not found'], 404);
        }

        $car->board = $request->board;
        $car->model = $request->model ? $request->model : null;
        $car->resident_id = $request->resident_id;

        $car->save();

        return response()->json($car, 201);
    }

    public function destroy($id)
    {
        $car = Resident::find($id);

        if (!$car){
            return response()->json(['error' => 'not found'], 404);
        }

        $car->delete();

        return response()->json('car removed successfully');
    }
}
