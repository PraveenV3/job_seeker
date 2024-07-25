<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use Illuminate\Support\Facades\Auth;


class CarController extends Controller
{

    public function index()
    {
        $cars = Auth::user()->cars;
        return view('cars.index',compact('cars'));
    }

    public function create()
    {
        return view('cars.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Vehicle_No' => 'required',
            'brand' => 'required',
            'model' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',

        ]);

        Auth::user()->cars()->create($request->all());
        return redirect()->route('cars.index')->with('success','Car created successfully.');
    }

    public function show($id)
    {
        $car = Car::find($id);
        return view('cars.show',compact('car'));
    }

    public function edit($id)
    {
        $car = Car::find($id);

        if (!$car) {
            return redirect()->route('cars.index')->with('error', 'Car not found');
        }

      
        if ($car->user_id !== Auth::user()->id) {
            abort(403, 'Unauthorized action.');
        }

        return view('cars.edit', compact('car'));
    }


    public function update(Request $request, $id)
    {
        $car = Car::find($id);

        if ($car->user_id !== Auth::user()->id) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'Vehicle_No' => 'required',
            'brand' => 'required',
            'model' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
        ]);

        $car->update($request->all());
        return redirect()->route('cars.index')->with('success','Car updated successfully');
    }

    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route('cars.index')->with('success','Car deleted successfully');
    }
}
