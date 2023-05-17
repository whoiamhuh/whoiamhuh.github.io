<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\ReservationController;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Enums\RestaurantsAddress;
use App\Models\Table;
use App\Http\Requests\ReservationStoreRequest;
use App\Rules\DateBetween;
use App\Enums\TableStatus;
use Carbon\Carbon;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservation::all();
        return view('admin.reservation.index', compact('reservations'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tables = Table::where('status', TableStatus::Свободен)->get();
        
       
        
        return view('admin.reservation.create', compact('tables'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReservationStoreRequest $request)
    {
        $table = Table::findOrFail($request->table_id);
        if($request->guest_number > $table-> guest_number){
            return back()->with('warning', 'Пожалуйста, выберите стол для соответствующего количества гостей.');
        }
     
        Reservation::create($request->validated());

        return to_route('admin.reservations.index')->with('success', 'Резервация создана успешно');
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
    public function edit(Reservation $reservation)
    {
        $tables = Table::where('status', TableStatus::Свободен)->get();
        return view('admin.reservation.edit', compact('reservation', 'tables'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ReservationStoreRequest $request, Reservation $reservation)
    {
        $table = Table::findOrFail($request->table_id);
        if($request->guest_number > $table-> guest_number){
            return back()->with('warning', 'Пожалуйста, выберите стол для соответствующего количества гостей.');
        }
        $reservation = $table->reservations()->where('id', '!=', $reservation->id)->get();

        $reservation->update($request->validated());
        return to_route('admin.reservations.index')->with('success', 'Резервация изменена успешно');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        
        $reservation->delete();

        return to_route('admin.reservations.index')->with('success', 'Резервация удалена успешно');
    }
}
