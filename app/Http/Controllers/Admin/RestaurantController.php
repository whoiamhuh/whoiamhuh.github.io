<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Http\Requests\RestaurantStoreRequest;
use Illuminate\Support\Facades\Storage;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $restaurants = Restaurant::all();
        return view('admin.restaurants.index', compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.restaurants.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RestaurantStoreRequest $request)
    { 
        $image = $request->file('image')->store('public/restaurants');

        Restaurant::create([
            'name'=> $request->name,
            'description' => $request->description,
            'image' => $image
        ]);

        return to_route('admin.restaurants.index')->with('success', 'Ресторан создан успешно');
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
    public function edit(Restaurant $restaurant)
    {
        return view('admin.restaurants.edit', compact('restaurant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $image = $restaurant->image;
        if($request->hasFile('image')){
            Storage::delete($restaurant->image);
            $image = $request->file('image')->store('public/restaurants');
        }

        $restaurant->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image
        ]);
        return to_route('admin.restaurants.index')->with('success', 'Ресторан отредактирован успешно');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Restaurant $restaurant)
    {
        Storage::delete($restaurant->image);
        $restaurant->tables()->detach();
        $restaurant->delete();

        return to_route('admin.restaurants.index')->with('danger', 'Ресторан удален успешно');
    }
}
