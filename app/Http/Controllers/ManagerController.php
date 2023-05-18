<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\VehicleUsage;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $bookings = Booking::query()
            ->where('approved_by', auth()->user()->id)
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


        return view('manager/index', compact('bookings', 'statuses'));
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
    public function update(Request $request, Booking $manager)
    {
        // dd($request->approve);

        $status = '';

        if ($request->approve) {
            $status = $request->approve;

            VehicleUsage::create([
                'vehicle_id' => $request->vehicle_id,
                'user_id' => $request->user_id,
                'usage_date' => now(),
            ]);
        }

        if ($request->cancel) {
            $status = $request->cancel;
        }

        $manager->update([
            'status' => $status
        ]);

        return redirect('cms/manager')->with('message', 'Success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
