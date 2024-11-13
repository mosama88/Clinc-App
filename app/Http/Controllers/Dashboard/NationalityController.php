<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Nationality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\NationalityRequest;
use App\Http\Requests\Dashboard\NationalityUpdateRequest;

class NationalityController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $com_code = auth()->user()->com_code;
        $data = Nationality::select("*")->where('com_code',$com_code)->orderBy('id','DESC')->paginate(10);
        return view('dashboard.nationalities.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.nationalities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NationalityRequest $request)
    {
        try{
            $com_code = auth()->user()->com_code;
            DB::beginTransaction();
           $blood = new Nationality();
           $blood['name'] = $request->name;
           $blood['created_by'] = 1;
           $blood['com_code'] = $com_code;
           $blood->save();
            DB::commit();
            return redirect()->route('dashboard.nationalities.index')->with('success', 'تم أضافة الجنسية بنجاح');            
            
        }catch(\Exeption $ex){
            DB::rollback();
            return redirect()->route('dashboard.nationalities.index')->withErrors('error', 'عفوآ لقد حدث خطأ !!' . $ex->getMessage());
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
        $info = Nationality::findOrFail($id);
        return view('dashboard.nationalities.edit',compact('info'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NationalityUpdateRequest $request, string $id)
    {
        try{
            $com_code = auth()->user()->com_code;
            DB::beginTransaction();
           $Updateblood = Nationality::findOrFail($id);
           $Updateblood['name'] = $request->name;
           $Updateblood['updated_by'] = 1;
           $Updateblood['com_code'] = $com_code;
           $Updateblood->save();
            DB::commit();
            return redirect()->route('dashboard.nationalities.index')->with('success', 'تم تعديل الجنسية بنجاح');            
            
        }catch(\Exeption $ex){
            DB::rollback();
            return redirect()->route('dashboard.nationalities.index')->withErrors('error', 'عفوآ لقد حدث خطأ !!' . $ex->getMessage());
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
           $Deleteblood = Nationality::findOrFail($id);
           $Deleteblood->delete();
            DB::commit();
            return redirect()->route('dashboard.nationalities.index')->with('success', 'تم حذف الجنسية بنجاح');            
            
        }catch(\Exeption $ex){
            DB::rollback();
            return redirect()->route('dashboard.nationalities.index')->withErrors('error', 'عفوآ لقد حدث خطأ !!' . $ex->getMessage());
        }

    }
}