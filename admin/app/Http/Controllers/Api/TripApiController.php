<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

use App\Models\TripCategory as Category;
use App\Models\Trip;
use App\Models\TripPhoto as Photo;

use \App\Libs\Response as Response;
use App\Models\TripCategory;
use App\Models\TripCoordinate;
use App\Models\TripSpeed;
use App\User;

class TripApiController extends Controller
{
    public function __construct()
    {
        $this->response = new Response();
    }

    public function start(Request $request)
    {
        $trip = Trip::create([
            "user_id" => Auth::user()->id,
            "category_id" => $request->category_id,
            "start" => \Carbon\Carbon::now()
        ]);

        $trip = Trip::where(['id' => $trip->id])->with(['user', 'category'])->first();

        return $this->response->success_response("success create start trip", $trip, 201);
    }

    // Upload image trip
    public function upload(Request $request, $id)
    {
        $trip = Trip::where(['id' => $id])->first();

        $image = Str::slug($trip->user->name . '-' . $trip->id . '-' . $request->longitude . '-' . $request->latitude) . ".png";

        if (preg_match('/^data:image\/(\w+);base64,/', $request->photo)) {
            $data = substr($request->photo, strpos($request->photo, ',') + 1);

            $data = base64_decode($data);
            Storage::disk('public')->put("/images/trips/" . $image, $data);
        }

        $photo = Photo::create([
            'trip_id' => $id,
            'photo' => "/images/trips/" . $image,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
            'caption' => $request->caption,
        ]);

        $photo = Photo::where(['id' => $photo->id])->with('trip')->first();

        return $this->response->success_response("success upload photo", $photo, 200);
    }

    public function getCategories(Request $request)
    {
        $categories = Category::all();

        return $this->response->success_response("success get trip categories", $categories, 200);
    }

    public function saveCoordinate(Request $request, $id)
    {
        $coordinate = TripCoordinate::create([
            "trip_id" => $id,
            "latitude" => $request->latitude,
            "longitude" => $request->longitude,
        ]);

        return $this->response->success_response("success save coordinate", $coordinate, 200);
    }

    public function saveSpeed(Request $request, $id)
    {
        $speed = TripSpeed::create([
            "trip_id" => $id,
            "speed" => $request->speed,
        ]);

        return $this->response->success_response("success save speed", $speed, 200);
    }

    public function finish(Request $request, $id)
    {
        $trip = Trip::where(['id' => $id])->update([
            "end" => \Carbon\Carbon::now(),
            "distance" => $request->distance,
            "time" => $request->time,
        ]);

        User::where(['id' => Auth::user()->id])->update([
            "point" => Auth::user()->point + round($request->distance)
        ]);

        $data = [
            "trip" => $trip,
            "fuel" => [
                "bike" => 0.2,
                "car" => 0.2,
            ]
        ];

        return $this->response->success_response("success finish trip", $trip, 200);
    }
}
