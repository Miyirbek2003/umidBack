<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        try {
            $employee = Employee::all();
            if (count($employee) > 0) {
                return response()->json([
                    "status" => true,
                    "items" => $employee
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
