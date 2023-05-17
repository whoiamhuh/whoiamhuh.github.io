<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\ReservationController;
use App\Models\Restaurant;
use App\Models\Table;
use Illuminate\Http\Request;
use App\Http\Requests\TableStoreRequest;
use App\Enums\TableLocation;
use App\Enums\TableStatus;


class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tables = Table::all();
        return view('admin.tables.index', compact('tables'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $restaurants = Restaurant::all();
        return view('admin.tables.create', compact('restaurants'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TableStoreRequest $request)
    {

        $table = Table::create([
            'name' => $request->name,
            'guest_number' => $request->guest_number,
            'status' => $request->status,
            'location' => $request->location,
            'address' =>$request->address,
        ]);

        if($request->has('restaurants')){
            $table->restaurants()->attach($request->restaurants);
        }

        return to_route('admin.tables.index')->with('success', 'Стол создан успешно');
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
    public function edit(Table $table)
    {
        $restaurants = Restaurant::all();
       return view('admin.tables.edit', compact('table', 'restaurants'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TableStoreRequest $request, Table $table)
    {

        $table->update($request->validated());

        if($request->has('restaurants')){
            $table->restaurants()->sync($request->restaurants);
        }

        return to_route('admin.tables.index')->with('success', 'Стол изменен успешно');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Table $table)
    {
        $table->restaurants()->detach();
        $table->delete();

        return to_route('admin.tables.index')->with('success', 'Стол удален успешно');
    }
}
