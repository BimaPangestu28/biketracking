<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use \App\Libs\Response as Response;

use App\User;

class UserApiController extends Controller
{
    public function __construct()
    {
        $this->response = new Response();
    }

    public function detail()
    {
        $user = Auth::user();
        return $this->response->success_response("Success get detail", $user, 200);
    }

    public function update(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'gender' => 'required',
        ]);

        if ($validation->fails()) {
            return $this->response->failed_response("failed update detail user", $validation->messages(), 401);
        }

        $image = Str::slug(Auth::user()->name) . ".png";

        if (preg_match('/^data:image\/(\w+);base64,/', $request->image)) {
            $data = substr($request->image, strpos($request->image, ',') + 1);

            $data = base64_decode($data);
            Storage::disk('public')->put("/images/users/" . $image, $data);
        }

        $request->image = "/images/users/" . $image;
        User::where(['id' => Auth::user()->id])->update([
            "name" => $request->name,
            "image" => $request->image,
            "biography" => $request->biography,
            "phone_number" => $request->phone_number,
            "gender" => $request->gender,
        ]);

        return $this->response->success_response("success update detail user", User::where(['id' => Auth::user()->id])->first(), 200);
    }
}
