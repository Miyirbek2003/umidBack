<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ImageSlide;
use Illuminate\Http\Request;

class ImageSlideController extends Controller
{
    public function index()
    {
        try {
            $slides = ImageSlide::all();

            if (count($slides) > 0) {
                return response()->json([
                    "status" => true,
                    "items" => $slides
                ]);
            } else {
                return response()->json([
                    "status" => false,
                    "items" => []
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                "status" => false,
                "message" => "Error",
                "errors" => $th->getMessage()
            ]);
        }
    }
}
