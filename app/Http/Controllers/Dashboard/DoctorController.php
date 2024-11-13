<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\City;
use App\Models\Doctor;
use App\Models\Governorate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\DoctorRequest;

class DoctorController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $com_code = auth()->user()->com_code;
        $data = Doctor::select("*")->where('com_code',$com_code)->orderBy('id','DESC')->paginate(10);
        return view('dashboard.doctors.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $other['governorates'] = Governorate::get();
        $other['cities'] = City::get();
        return view('dashboard.doctors.create',compact('other'));
        }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DoctorRequest $request)
    {
        try{
            $com_code = auth()->user()->com_code;
            DB::beginTransaction();
           $Branch = new Doctor();
           $Branch['name'] = $request->name;
           $Branch['address'] = $request->address;
           $Branch['phone'] = $request->phone;
           $Branch['email'] = $request->email ;
           $Branch['governorate_id'] = $request->governorate_id;
           $Branch['city_id'] = $request->city_id;
           $Branch['status'] = 1;
           $Branch['created_by'] = 1;
           $Branch['com_code'] = $com_code;
           $Branch->save();
            DB::commit();
            return redirect()->route('dashboard.doctors.index')->with('success', 'تم أضافة الطبيب بنجاح');            
            
        }catch(\Exeption $ex){
            DB::rollback();
            return redirect()->route('dashboard.doctors.index')->withErrors('error', 'عفوآ لقد حدث خطأ !!' . $ex->getMessage());
        }
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
        $info = Doctor::findOrFail($id);
        $other['governorates'] = Governorate::get();
        $other['cities'] = City::get();
        return view('dashboard.doctors.edit',compact('info','other'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DoctorRequest $request, string $id)
    {
        try{
            $com_code = auth()->user()->com_code;
            DB::beginTransaction();
           $UpdateBranch = Doctor::findOrFail($id);
           $UpdateBranch['name'] = $request->name;
           $UpdateBranch['address'] = $request->address;
           $UpdateBranch['phone'] = $request->phone;
           $UpdateBranch['email'] = $request->email ;
           $UpdateBranch['governorate_id'] = $request->governorate_id;
           $UpdateBranch['city_id'] = $request->city_id;
           $UpdateBranch['status'] = $request->status;
           $UpdateBranch['updated_by'] = 1;
           $UpdateBranch['com_code'] = $com_code;
           $UpdateBranch->save();
            DB::commit();
            return redirect()->route('dashboard.doctors.index')->with('success', 'تم تعديل الطبيب بنجاح');            
            
        }catch(\Exeption $ex){
            DB::rollback();
            return redirect()->route('dashboard.doctors.index')->withErrors('error', 'عفوآ لقد حدث خطأ !!' . $ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $com_code = auth()->user()->com_code;
            DB::beginTransaction();
           $DeleteBranch = Doctor::findOrFail($id);
           $DeleteBranch->delete();
            DB::commit();
            return redirect()->route('dashboard.doctors.index')->with('success', 'تم حذف الطبيب بنجاح');            
            
        }catch(\Exeption $ex){
            DB::rollback();
            return redirect()->route('dashboard.doctors.index')->withErrors('error', 'عفوآ لقد حدث خطأ !!' . $ex->getMessage());
        }
    }

    public function getCities(Request $request)
{
    if ($request->ajax()) {
        $governorate_id = $request->governorate_id;
        $other['cities'] = City::where('governorate_id', $governorate_id)->get();
        return view('dashboard.doctors.getCitites',compact('other'));
    }
}






    
}