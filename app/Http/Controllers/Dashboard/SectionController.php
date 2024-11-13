<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\SectionRequest;
use App\Http\Requests\Dashboard\SectionUpdateRequest;

class SectionController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $com_code = auth()->user()->com_code;
        $data = Section::select("*")->where('com_code',$com_code)->orderBy('id','DESC')->paginate(10);
        return view('dashboard.sections.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.sections.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SectionRequest $request)
    {
        try{
            $com_code = auth()->user()->com_code;
            DB::beginTransaction();
           $blood = new Section();
           $blood['name'] = $request->name;
           $blood['created_by'] = 1;
           $blood['com_code'] = $com_code;
           $blood->save();
            DB::commit();
            return redirect()->route('dashboard.sections.index')->with('success', 'تم أضافة القسم بنجاح');            
            
        }catch(\Exeption $ex){
            DB::rollback();
            return redirect()->route('dashboard.sections.index')->withErrors('error', 'عفوآ لقد حدث خطأ !!' . $ex->getMessage());
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
        $info = Section::findOrFail($id);
        return view('dashboard.sections.edit',compact('info'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SectionUpdateRequest $request, string $id)
    {
        try{
            $com_code = auth()->user()->com_code;
            DB::beginTransaction();
           $Updateblood = Section::findOrFail($id);
           $Updateblood['name'] = $request->name;
           $Updateblood['updated_by'] = 1;
           $Updateblood['com_code'] = $com_code;
           $Updateblood->save();
            DB::commit();
            return redirect()->route('dashboard.sections.index')->with('success', 'تم تعديل القسم بنجاح');            
            
        }catch(\Exeption $ex){
            DB::rollback();
            return redirect()->route('dashboard.sections.index')->withErrors('error', 'عفوآ لقد حدث خطأ !!' . $ex->getMessage());
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
           $Deleteblood = Section::findOrFail($id);
           $Deleteblood->delete();
            DB::commit();
            return redirect()->route('dashboard.sections.index')->with('success', 'تم حذف القسم بنجاح');            
            
        }catch(\Exeption $ex){
            DB::rollback();
            return redirect()->route('dashboard.sections.index')->withErrors('error', 'عفوآ لقد حدث خطأ !!' . $ex->getMessage());
        }

    }
}