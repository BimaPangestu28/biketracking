<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trip;
use App\User;

class DashboardController extends Controller
{
    public function format($number)
    {
        return number_format($number, 0, '.', ',');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $first_day_this_month = date('Y-m-01');
        $last_day_this_month  = date('Y-m-t');

        $total_trips = $this->format(Trip::whereBetween('created_at', [$first_day_this_month, $last_day_this_month])->count());
        $total_users = $this->format((User::where(['is_admin' => false])->whereBetween('created_at', [$first_day_this_month, $last_day_this_month])->count()));
        $total_distances = $this->format(Trip::whereBetween('created_at', [$first_day_this_month, $last_day_this_month])->sum('distance'));
        $total_fuel_reduce = $this->format(round(Trip::whereBetween('created_at', [$first_day_this_month, $last_day_this_month])->sum('distance') * .2, 2));

        return view('pages.dashboards.index', compact('total_trips', 'total_users', 'total_distances', 'total_fuel_reduce'));
    }

    public function api(Request $request)
    {
        $first_day_this_month = date($request->query('start'));
        $last_day_this_month = date($request->query('end'));

        $total_trips = $this->format(Trip::whereBetween('created_at', [$first_day_this_month, $last_day_this_month])->count());
        $total_users = $this->format((User::where(['is_admin' => false])->whereBetween('created_at', [$first_day_this_month, $last_day_this_month])->count()));
        $total_distances = $this->format(Trip::whereBetween('created_at', [$first_day_this_month, $last_day_this_month])->sum('distance'));
        $total_fuel_reduce = $this->format(round(Trip::whereBetween('created_at', [$first_day_this_month, $last_day_this_month])->sum('distance') * .2, 2));

        return response()->json(["total_trips" => $total_trips, "total_users" => $total_users, "total_distances" => $total_distances, "total_fuel_reduce" => $total_fuel_reduce]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
