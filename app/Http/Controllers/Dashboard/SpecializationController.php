<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\SpecializationsRequest;
use App\Http\Requests\Dashboard\SpecializationsUpdateRequest;

class SpecializationController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $com_code = auth()->user()->com_code;
        $data = Specialization::select("*")->where('com_code',$com_code)->orderBy('id','DESC')->get();
        return view('dashboard.specializations.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.specializations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SpecializationsRequest $request)
    {
        try{
            $com_code = auth()->user()->com_code;
            DB::beginTransaction();
           $blood = new Specialization();
           $blood['name'] = $request->name;
           $blood['created_by'] = 1;
           $blood['com_code'] = $com_code;
           $blood->save();
            DB::commit();
            return redirect()->route('dashboard.specializations.index')->with('success', 'تم أضافة التخصص بنجاح');            
            
        }catch(\Exeption $ex){
            DB::rollback();
            return redirect()->route('dashboard.specializations.index')->withErrors('error', 'عفوآ لقد حدث خطأ !!' . $ex->getMessage());
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
        $info = Specialization::findOrFail($id);
        return view('dashboard.specializations.edit',compact('info'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SpecializationsUpdateRequest $request, string $id)
    {
        try{
            $com_code = auth()->user()->com_code;
            DB::beginTransaction();
           $Updateblood = Specialization::findOrFail($id);
           $Updateblood['name'] = $request->name;
           $Updateblood['updated_by'] = 1;
           $Updateblood['com_code'] = $com_code;
           $Updateblood->save();
            DB::commit();
            return redirect()->route('dashboard.specializations.index')->with('success', 'تم تعديل التخصص بنجاح');            
            
        }catch(\Exeption $ex){
            DB::rollback();
            return redirect()->route('dashboard.specializations.index')->withErrors('error', 'عفوآ لقد حدث خطأ !!' . $ex->getMessage());
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
           $Deleteblood = Specialization::findOrFail($id);
           $Deleteblood->delete();
            DB::commit();
            return redirect()->route('dashboard.specializations.index')->with('success', 'تم حذف التخصص بنجاح');            
            
        }catch(\Exeption $ex){
            DB::rollback();
            return redirect()->route('dashboard.specializations.index')->withErrors('error', 'عفوآ لقد حدث خطأ !!' . $ex->getMessage());
        }

    }
}