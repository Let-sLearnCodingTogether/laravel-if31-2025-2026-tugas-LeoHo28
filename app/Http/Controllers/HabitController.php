<?php

namespace App\Http\Controllers;

use App\Models\Habit;
use Illuminate\Http\Request;

class HabitController extends Controller
{
    public function index()
    {
        return Habit::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'habit_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'frequency' => 'required|in:daily,weekly,monthly',
        ]);

        return Habit::create($validated);
    }

    public function show(Habit $habit)
    {
        return $habit;
    }

    public function update(Request $request, Habit $habit)
    {
        $validated = $request->validate([
            'habit_name' => 'sometimes|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'sometimes|date',
            'frequency' => 'sometimes|in:daily,weekly,monthly',
        ]);

        $habit->update($validated);

        return $habit;
    }

    public function destroy(Habit $habit)
    {
        $habit->delete();
        return response()->json(['message' => 'Habit deleted']);
    }
}
