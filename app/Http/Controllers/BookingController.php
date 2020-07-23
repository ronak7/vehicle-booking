<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Vehicle;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('booking', compact('vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->booking_session = $request->type=='full' ? '' : $request->booking_session;
            $validation = validator($request->all(), [
                'vehicle_id' => 'require',
                'date' => 'require',
                'type' => 'require',
                'name' => 'require',
                'email' => 'require',
                'contact' => 'require',
                'dob' => 'require',
                'address' => 'require',
                'zip' => 'require',
                'city' => 'require',
                'state' => 'require',
            ]);

            $w = [
                ['vehicle_id', $request->vehicle_id],
                ['date', $request->date],
            ];
            if ($request->type == "full") {
                array_push($w, ['type', $request->type]);
                array_push($w, ['booking_session', $request->booking_session]);
            }

            $ckbooking = Booking::where($w)->orWhere([['type', $request->type], ['booking_session', $request->booking_session]])->get();

            if($ckbooking->count() > 0){
                $msg = "Already booked.";
            }else {
                $booking = new Booking();
                $booking->vehicle_id = $request->vehicle_id;
                $booking->date = $request->date;
                $booking->type = $request->type;
                $booking->booking_session = $request->booking_session;
                $booking->name = $request->name;
                $booking->email = $request->email;
                $booking->contact = $request->contact;
                $booking->dob = date('Y-m-d', strtotime($request->dob));
                $booking->address = $request->address;
                $booking->zip = $request->zip;
                $booking->city = $request->city;
                $booking->state = $request->state;
                $booking->save();

                $msg = 'Booking added.';
            }
            return redirect()->route("booking.index")->with('msg', $msg);
        } catch (\Exception $e) {
            echo $e;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
