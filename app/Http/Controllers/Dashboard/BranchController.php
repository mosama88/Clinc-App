<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\City;
use App\Models\Branch;
use App\Models\Governorate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class BranchController extends Controller
{
  /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $com_code = auth()->user()->com_code;
        $other['governorates'] = Governorate::get();
        $other['cities'] = City::get();
        $data = Branch::select("*")->where('com_code',$com_code)->orderBy('id','DESC')->get();
        return view('dashboard.branches.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $other['governorates'] = Governorate::get();
        $other['cities'] = City::get();
        return view('dashboard.branches.create',compact('other'));
        }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $com_code = auth()->user()->com_code;
            DB::beginTransaction();
           $blood = new Branch();
           $blood['name'] = $request->name;
           $blood['address'] = $request->address;
           $blood['phone'] = $request->phone;
           $blood['email'] = $request->email ;
           $blood['governorate_id'] = $request->governorate_id;
           $blood['city_id'] = $request->city_id;
           $blood['status'] = 1;
           $blood['created_by'] = 1;
           $blood['com_code'] = $com_code;
           $blood->save();
            DB::commit();
            return redirect()->route('dashboard.branches.index')->with('success', 'تم أضافة الفرع بنجاح');            
            
        }catch(\Exeption $ex){
            DB::rollback();
            return redirect()->route('dashboard.branches.index')->withErrors('error', 'عفوآ لقد حدث خطأ !!' . $ex->getMessage());
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
        $info = Branch::findOrFail($id);
        $other['governorates'] = Governorate::get();
        $other['cities'] = City::get();
        return view('dashboard.branches.edit',compact('info','other'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            $com_code = auth()->user()->com_code;
            DB::beginTransaction();
           $UpdateBranch = Branch::findOrFail($id);
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
            return redirect()->route('dashboard.branches.index')->with('success', 'تم تعديل الفرع بنجاح');            
            
        }catch(\Exeption $ex){
            DB::rollback();
            return redirect()->route('dashboard.branches.index')->withErrors('error', 'عفوآ لقد حدث خطأ !!' . $ex->getMessage());
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
           $DeleteBranch = Branch::findOrFail($id);
           $DeleteBranch->delete();
            DB::commit();
            return redirect()->route('dashboard.branches.index')->with('success', 'تم حذف الفرع بنجاح');            
            
        }catch(\Exeption $ex){
            DB::rollback();
            return redirect()->route('dashboard.branches.index')->withErrors('error', 'عفوآ لقد حدث خطأ !!' . $ex->getMessage());
        }

    }
}