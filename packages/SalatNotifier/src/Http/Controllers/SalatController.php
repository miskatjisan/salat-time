<?php

namespace SalatNotifier\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SalatNotifier\Models\SalatTime;

class SalatController extends Controller
{

    public function index()
    {
        $salatTimes = SalatTime::all();
        return response()->json($salatTimes);
    }


    public function store(Request $request)
    {
        $request->validate([
            'fajr' => 'required|date_format:H:i',
            'dhuhr' => 'required|date_format:H:i',
            'asr' => 'required|date_format:H:i',
            'maghrib' => 'required|date_format:H:i',
            'isha' => 'required|date_format:H:i',
        ]);

        $salatTime = SalatTime::create($request->all());

        return response()->json(['message' => 'Salat times have been saved.'], 201);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'fajr' => 'required|date_format:H:i',
            'dhuhr' => 'required|date_format:H:i',
            'asr' => 'required|date_format:H:i',
            'maghrib' => 'required|date_format:H:i',
            'isha' => 'required|date_format:H:i',
        ]);

        $salatTime = SalatTime::findOrFail($id);
        $salatTime->update($request->all());

        return response()->json(['message' => 'Salat times have been updated.']);
    }

 
    public function destroy($id)
    {
        $salatTime = SalatTime::findOrFail($id);
        $salatTime->delete();

        return response()->json(['message' => 'Salat time has been deleted.']);
    }
}
