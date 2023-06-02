<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        $tables = [
            [
                "Name" => "Name",
                "Position" => "Position",
                "Office" => "Office",
                "Age" => "Age",
                "Start_date" => "Start date",
                "Salary" => "Salary"
            ],
            [
                "Name" => "Name",
                "Position" => "Position",
                "Office" => "Office",
                "Age" => "Age",
                "Start_date" => "Start date",
                "Salary" => "Salary"
            ]
        ];
        return view('pages.dashboard', [
            'areaChart' => false,
            'barChart' => false,
            'tables' => $tables
        ]);
    }
}
