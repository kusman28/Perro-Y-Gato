<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Patient;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Patient::latest()->paginate(5);
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
        $this->validate($request,[
            'firstname' => 'required|string|max:15',
            'middlename' => 'required|string|max:15',
            'lastname' => 'required|string|max:15',
            'age' => 'required|numeric|max:99',
            'contact_no' => 'required|string|max:11',
            'address' => 'required|string|max:50',
            'pet_name' => 'required|string|max:15',
            'pet_type' => 'required|string|max:15',
            'pet_note' => 'required|string|max:200',
        ]);

        return Patient::create([
            'firstname' => $request['firstname'],
            'middlename' => $request['middlename'],
            'lastname' => $request['lastname'],
            'age' => $request['age'],
            'contact_no' => $request['contact_no'],
            'address' => $request['address'],
            'pet_name' => $request['pet_name'],
            'pet_type' => $request['pet_type'],
            'pet_note' => $request['pet_note'],
        ]);
        // Patient::create($request->all());

        // return (['message' => 'Success.']);
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        $patient = Patient::findOrFail($id);

        $this->validate($request, [
            'firstname' => 'required|string|max:15',
            'middlename' => 'required|string|max:15',
            'lastname' => 'required|string|max:15',
            'age' => 'required|numeric|max:99',
            'contact_no' => 'required|string|max:11',
            'address' => 'required|string|max:50',
            'pet_name' => 'required|string|max:15',
            'pet_type' => 'required|string|max:15',
            'pet_note' => 'required|string|max:15',
        ]);

        $patient->update($request->all());
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
