<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Models\Qualification;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\QualificationRequest;

class QualificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $com_code = auth()->user()->com_code;
        $data = Qualification::select("*")->where('com_code',$com_code)->orderBy('id','DESC')->paginate(10);
        return view('dashboard.settings.qualifications.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.settings.qualifications.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(QualificationRequest $request)
    {
        try{
            $com_code = auth()->user()->com_code;
            DB::beginTransaction();
           $qualification = new Qualification();
           $qualification['name'] = $request->name;
           $qualification['created_by'] = 1;
           $qualification['com_code'] = $com_code;
           $qualification->save();
            DB::commit();
            return redirect()->route('dashboard.qualifications.index')->with('success', 'تم أضافة المؤهل بنجاح');            
            
        }catch(\Exeption $ex){
            DB::rollback();
            return redirect()->route('dashboard.qualifications.index')->withErrors('error', 'عفوآ لقد حدث خطأ !!' . $ex->getMessage());
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
        $info = Qualification::findOrFail($id);
        return view('dashboard.settings.qualifications.edit',compact('info'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(QualificationRequest $request, string $id)
    {
        try{
            $com_code = auth()->user()->com_code;
            DB::beginTransaction();
           $UpdateQualification = Qualification::findOrFail($id);
           $UpdateQualification['name'] = $request->name;
           $UpdateQualification['updated_by'] = 1;
           $UpdateQualification['com_code'] = $com_code;
           $UpdateQualification->save();
            DB::commit();
            return redirect()->route('dashboard.qualifications.index')->with('success', 'تم تعديل المؤهل بنجاح');            
            
        }catch(\Exeption $ex){
            DB::rollback();
            return redirect()->route('dashboard.qualifications.index')->withErrors('error', 'عفوآ لقد حدث خطأ !!' . $ex->getMessage());
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
           $DeleteQualification = Qualification::findOrFail($id);
           $DeleteQualification->delete();
            DB::commit();
            return redirect()->route('dashboard.qualifications.index')->with('success', 'تم حذف المؤهل بنجاح');            
            
        }catch(\Exeption $ex){
            DB::rollback();
            return redirect()->route('dashboard.qualifications.index')->withErrors('error', 'عفوآ لقد حدث خطأ !!' . $ex->getMessage());
        }

    }
}