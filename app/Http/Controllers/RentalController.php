<?php

namespace App\Http\Controllers;

use App\Helpers\Res;
use App\Models\Rental;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RentalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Res::success(Rental::paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'car_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $rental = Rental::create($request->all());

        return Res::success($rental);
    }

    /**
     * Display the specified resource.
     */
    public function show(Rental $rental)
    {
        //
        return Res::success($rental);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rental $rental)
    {
        //
        $rental->update($request->all());

        return Res::success($rental);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rental $rental)
    {
        //
        $rental->delete();
        return Res::success(null, 'Rental deleted successfully');
    }
}
