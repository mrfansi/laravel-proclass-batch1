<?php

namespace App\Http\Controllers;

use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return EmployeeResource::collection(Employee::orderBy('created_at', 'desc')->get());
        }

        $employees = Employee::orderBy('created_at', 'desc')->get();

        return view('pages.employee.index', compact('employees'));
    }

    public function create()
    {
        return view('pages.employee.create');
    }

    public function store(Request $request)
    {
        $payload = $request->validate([
            "name" => "required",
            "position" => "required",
            "office" => "required",
            "age" => "required|numeric|min:18",
            "start_date" => "required|date",
            "salary" => "required|numeric",
        ]);

        $employee = Employee::create($payload);
        return EmployeeResource::make($employee)
            ->additional([
                "success" => "Data successfully saved"
            ]);
    }
}
