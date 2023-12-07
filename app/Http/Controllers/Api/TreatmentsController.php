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
