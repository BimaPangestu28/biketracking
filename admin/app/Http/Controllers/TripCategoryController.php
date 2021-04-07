<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;

use App\TripCategory as TripCategory;
use Illuminate\Http\Request;

class TripCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = TripCategory::all();

        return view('pages.trips.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.trips.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'name' => 'required',
        ]);

        $image = $request->file('image');

        $nama_image = Str::slug($request->name) . $image->getClientOriginalName();

        $tujuan_upload = 'images/category';
        $image->move($tujuan_upload, $nama_image);

        $request->image = $tujuan_upload . "/" . $nama_image;

        $category = TripCategory::create([
            "name" => $request->name,
            "image" => $request->image,
        ]);

        return redirect()->route('trips.categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TripCategory  $tripCategory
     * @return \Illuminate\Http\Response
     */
    public function show(TripCategory $tripCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TripCategory  $tripCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(TripCategory $tripCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TripCategory  $tripCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TripCategory $tripCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TripCategory  $tripCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(TripCategory $tripCategory, $id)
    {
        TripCategory::where(['id' => $id])->delete();

        return redirect()->route('trips.categories.index');
    }
}
