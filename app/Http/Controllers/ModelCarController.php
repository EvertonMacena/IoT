<?php

namespace App\Http\Controllers;

use App\ModelCar;
use App\Resident;
use Illuminate\Http\Request;

class ModelCarController extends Controller
{
    /**
     * Store a new user.
     *
     * @param  Request  $request
     * @return Response
     */

    public function index()
    {
        $models = ModelCar::all();
        return response()->json($models);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'fabric'     => 'required',
            'ano'   => 'required',
            'description'   =>  'required'
        ]);

        $model = new ModelCar();

        $model->fabric = $request->fabric;
        $model->ano = $request->ano;
        $model->description = $request->description;


        $model->save();

        return response()->json($model, 201);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'fabric'     => 'required',
            'ano'   => 'required',
            'description'   =>  'required'
        ]);

        $model = ModelCar::find($id);

        if (!$model){
            return response()->json(['error' => 'not found'], 404);
        }

        $model->fabric = $request->fabric;
        $model->ano = $request->ano;
        $model->description = $request->description;

        $model->save();

        return response()->json($model, 201);
    }

    public function destroy($id)
    {
        $model = ModelCar::find($id);

        if (!$model){
            return response()->json(['error' => 'not found'], 404);
        }

        $model->delete();

        return response()->json('model removed successfully');
    }
}
