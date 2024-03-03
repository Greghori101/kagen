<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alarm;

class AlarmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alarms = Alarm::all();
        return response()->json(['data' => $alarms]);
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
            'title' => 'required|string',
            'degree' => 'required|numeric',
            'closed' => 'required|boolean',
        ]);

        $alarm = Alarm::create($validatedData);

        return response()->json(['message' => 'Alarm created successfully', 'data' => $alarm], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $alarm = Alarm::findOrFail($id);
        return response()->json(['data' => $alarm]);
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
            'title' => 'required|string',
            'degree' => 'required|numeric',
            'closed' => 'required|boolean',
        ]);

        $alarm = Alarm::findOrFail($id);
        $alarm->update($validatedData);


        return response()->json(['message' => 'Alarm updated successfully', 'data' => $alarm]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alarm = Alarm::findOrFail($id);
        $alarm->delete();


        return response()->json(['message' => 'Alarm deleted successfully']);
    }

}
