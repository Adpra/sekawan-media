<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\VehicleUsage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehicles = Vehicle::all();
        $usedVehicles = VehicleUsage::pluck('vehicle_id')->toArray();

        $totalVehicles = $vehicles->count();
        $unusedVehicles = $totalVehicles - count($usedVehicles);

        return view('home', compact('unusedVehicles', 'usedVehicles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
