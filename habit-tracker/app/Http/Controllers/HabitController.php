<?php

namespace App\Http\Controllers;

use App\Models\Habit;
use Illuminate\Http\Request;

class HabitController extends Controller
{
    public function index(Request $request)
    {
        return Habit::where('user_id', $request->user()->id)->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'goal' => 'nullable|string'
        ]);

        $data['user_id'] = $request->user()->id;
        $habit = Habit::create($data);

        return response()->json($habit, 201);
    }

    public function show($id)
    {
        return Habit::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $habit = Habit::where('user_id', $request->user()->id)->findOrFail($id);
        $habit->update($request->all());
        return response()->json($habit);
    }

    public function destroy(Request $request, $id)
    {
        $habit = Habit::where('user_id', $request->user()->id)->findOrFail($id);
        $habit->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
