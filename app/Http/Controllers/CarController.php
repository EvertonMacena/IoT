<?php

namespace App\Http\Controllers;

use App\Car;
use App\ModelCar;
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
        $cars = Car::with('model')->get();
        return response()->json($cars);
    }

    public function show($id)
    {
        $car = Car::where('id', $id)->with(['model', 'resident'])->firstOrFail();
        return response()->json($car);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'board'     => 'required|unique:cars',
            'model_id'  => 'required',
            'resident_id'   => 'required',
            'tag'   => 'required|unique:cars'
        ]);

        $car = new Car();

        $car->board = $request->board;
        $car->tag = $request->tag;
        $car->model_id = $request->model_id;
        $car->resident_id = $request->resident_id;


        $car->save();

        return response()->json($car, 201);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'board'     => 'required|unique:cars',
            'model_id'  => 'required',
            'resident_id'   => 'required',
            'tag'   => 'required|unique:cars'
        ]);

        $car = Car::find($id);

        if (!$car){
            return response()->json(['error' => 'not found'], 404);
        }

        $car->board = $request->board;
        $car->tag = $request->tag;
        $car->model_id = $request->model_id;
        $car->resident_id = $request->resident_id;

        $car->save();

        return response()->json($car, 201);
    }

    public function destroy($id)
    {
        $car = Car::find($id);

        if (!$car){
            return response()->json(['error' => 'not found'], 404);
        }

        $car->delete();

        return response()->json('car removed successfully');
    }
}
