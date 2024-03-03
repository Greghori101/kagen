<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Data::all();
        return response()->json(['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'key' => 'required|string',
            'temperature' => 'required|numeric',
            'humidity' => 'required|numeric',
            'flameSensor' => 'required|numeric',
            'smokeSensor' => 'required|numeric',
            'longitude' => 'required|numeric',
            'latitude' => 'required|numeric',
        ]);

        $data = Data::create($validatedData);


        return response()->json(['message' => 'Data created successfully', 'data' => $data], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Data::findOrFail($id);
        return response()->json(['data' => $data]);
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
        $validatedData = $request->validate([
            'key' => 'required|string',
            'temperature' => 'required|numeric',
            'humidity' => 'required|numeric',
            'flameSensor' => 'required|numeric',
            'smokeSensor' => 'required|numeric',
            'longitude' => 'required|numeric',
            'latitude' => 'required|numeric',
        ]);

        $data = Data::findOrFail($id);
        $data->update($validatedData);


        return response()->json(['message' => 'Data updated successfully', 'data' => $data]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Data::findOrFail($id);
        $data->delete();


        return response()->json(['message' => 'Data deleted successfully']);
    }
}
