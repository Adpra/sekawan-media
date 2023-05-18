<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingRequest;
use App\Models\Booking;
use App\Models\Branch;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\VehicleUsage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $bookings = Booking::query()
            ->orderBy('id', 'DESC')
            ->paginate();

        if ($request->filter) {
            $bookings = Booking::query()->where('status', $request->filter)
                ->orderBy('id', 'DESC')
                ->paginate();
        }

        $statuses = [
            'In Proccess',
            'Approved',
            'Canceled'
        ];

        $bookings->appends($request->query());

        return view('admin.index', compact('bookings', 'statuses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vehicles = Vehicle::whereDoesntHave('vehicleUsage')->get();

        $drivers = User::query()
            ->where('role', 'driver')
            ->whereDoesntHave('driver')
            ->get();

        $managers = User::query()->where('role', 'manager')->get();

        $branchs = Branch::query()->get();

        return view('admin.create', compact('vehicles', 'drivers', 'managers', 'branchs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookingRequest $request)
    {
        // dd($request->all());

        Booking::create([
            "vehicle_id" => $request->vehicle,
            "user_id" => $request->user_id,
            "branch_id" => $request->branch_id,
            "approved_by" => $request->approved_by,
            "start_date" => $request->start_date,
            "end_date" => $request->end_date,
            "status" => 'In Proccess'
        ]);

        return redirect('cms/admin')->with('message', 'created success!');
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
    public function edit(Booking $admin)
    {

        $vehicles = Vehicle::query()->get();

        $drivers = User::query()->where('role', 'driver')->get();

        $managers = User::query()->where('role', 'manager')->get();

        $branchs = Branch::query()->get();

        return view('admin.edit', compact('admin', 'vehicles', 'drivers', 'managers', 'branchs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookingRequest $request, Booking $admin)
    {


        $admin->update([
            "vehicle_id" => $request->vehicle,
            "user_id" => $request->user_id,
            "branch_id" => $request->branch_id,
            "approved_by" => $request->approved_by,
            "start_date" => $request->start_date,
            "end_date" => $request->end_date,
            "status" => 'In Proccess'
        ]);

        return redirect('cms/admin')->with('message', 'updated success!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $admin)
    {

        $admin->delete();

        $vehicleUsage = VehicleUsage::where('vehicle_id', $admin->vehicle_id)->first();

        $vehicleUsage->delete();

        return redirect('cms/admin')->with('message', 'deleted success!');
    }
}
