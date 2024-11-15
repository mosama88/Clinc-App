<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\City;
use App\Models\Branch;
use App\Models\Section;
use App\Models\Employee;
use App\Models\JobGrade;
use App\Models\ShiftType;
use App\Models\BloodTypes;
use App\Models\Department;
use App\Models\Governorate;
use App\Models\JobCategory;
use App\Models\Nationality;
use Illuminate\Http\Request;
use App\Models\Qualification;
use App\Http\Controllers\Controller;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $com_code = auth()->user()->com_code;
        $data = Employee::select("*")->where('com_code',$com_code)->orderBy('id','DESC')->paginate(10);
        return view('dashboard.employees.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $other['nationalities'] = Nationality::get();
        $other['sections'] = Section::get();
        $other['blood_types'] = BloodTypes::get();
        $other['branches'] = Branch::get();
        $other['departments'] = Department::get();
        $other['governorates'] = Governorate::get();
        $other['job_categories'] = JobCategory::get();
        $other['qualifications'] = Qualification::get();
        $other['shift_types'] = ShiftType::get();
        $other['cities'] = City::get();
        $other['job_grades'] = JobGrade::get();
        return view('dashboard.employees.create',compact('other'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}