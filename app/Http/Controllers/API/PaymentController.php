<?php

namespace App\Http\Controllers\API;

use App\Payment;
use App\Patient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Payment::latest()->paginate(5);
        $payments = \DB::table('patients') 
            ->join('payments', 'patients.id', '=', 'payments.patient_id') 
            ->select('patients.*', 'payments.product', 'payments.amount', 'payments.amount_paid') 
            ->latest()
            ->paginate(8); 
        return $payments;
    }

    public function payments() 
    {
        // return Patient::with('payment')->latest()->get();
        return Patient::with('payment')->latest()->paginate(5);
        // return Patient::with('one')->latest()->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $this->validate($request, [
            'product' => 'required',
            'amount' => 'required|numeric',
            'amount_paid' => 'required|numeric',
            // 'status' => 'required'
        ]);

        return Payment::create($request->all());
        // return Payment::create([
        //     'patient_id' => $request['patient_id'],
        //     'patient' => $request['patient'],
        //     'product' => $request['product'],
        //     'amount' => $request['amount'],
        //     'amount_paid' => $request['amount_paid'],
        //     'status' => $request['product'],
        // ]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
