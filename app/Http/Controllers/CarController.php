<?php

namespace App\Http\Controllers;

use App\Helpers\Res;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Car::orderBy("id", "desc")->paginate(8);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'produced_on' => 'required|date',
            'price' => 'required|integer'
        ]);

        $car = Car::create($request->all());

        return Res::success($car, 'Car created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        return $car;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
        $car->update($request->all());

        return Res::success($car, 'Car updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        $car->delete();
        return Res::success($car,'Car deleted successfully');
    }
}