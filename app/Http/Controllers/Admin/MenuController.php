<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Menu;
use App\Http\Requests\MenuStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Restaurant;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::all();
        return view('admin.menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.menus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MenuStoreRequest $request)
    {
        $image = $request->file('image')->store('public/menus');

        Menu::create([
            'name'=> $request->name,
            'description' => $request->description,
            'image' => $image,
            'price' => $request->price
        ]);

        return to_route('admin.menus.index')->with('success', 'Меню создано успешно');
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
    public function edit(Menu $menu)
    {
        $restaurants = Restaurant::all();
        return view('admin.menus.edit', compact('menu', 'restaurants'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);
        $image = $menu->image;
        if($request->hasFile('image')){
            Storage::delete($menu->image);
            $image = $request->file('image')->store('public/menus');
        }

        $menu->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image,
            'price' => $request->price,
        ]);
        return to_route('admin.menus.index')->with('success', 'Меню изменено успешно');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        Storage::delete($menu->image);
        $menu->delete();

        return to_route('admin.menus.index')->with('success', 'Меню удалено успешно');
    }
}
