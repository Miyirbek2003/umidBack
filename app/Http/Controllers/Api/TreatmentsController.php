<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TreatmentsResource;
use App\Models\Treatments;
use Illuminate\Http\Request;

class TreatmentsController extends Controller
{
    public function index()
    {
        try {
            // $slides = TreatmentsResource::collection(Treatments::all());
            $slides = Treatments::all();

            if (count($slides) > 0) {
                return $slides;
            } else {
                return response()->json([
                    "status" => false,
                    "items" => $slides
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
