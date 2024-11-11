<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Currency;
use Illuminate\Http\Request;
use App\Models\CalcNetSalary;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class calcNetSalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = CalcNetSalary::select("*")->orderBy('id','DESC')->get();
        return view('dashboard.calcNetSalaries.index',compact('data'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $other['currencies'] = Currency::orderBy('id','DESC')->get();
        return view('dashboard.calcNetSalaries.create',['other'=>$other]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        try{
            DB::beginTransaction();
            
            $calcNetSalary = new CalcNetSalary();
            
            $amount_currency = Currency::where('id',$request->currency_id)->value('amount');
            $calcNetSalary['number_of_month'] = 12;
            
            if($amount_currency){
                $salary_monthly = $request['salary'] * $amount_currency;

                if($amount_currency){
                    $salary_yaerly = $salary_monthly * $calcNetSalary['number_of_month'];
                }else{
                    $salary_yaerly = 0;
                }
            }else{
                $salary_monthly = 0;
            }

            $calcNetSalary['currency_id'] =  $request->currency_id;
            $calcNetSalary['salary'] =  $request->salary;
            $calcNetSalary['calc_salary_month'] =  $salary_monthly;
            $calcNetSalary['calc_salary_year'] =  $salary_yaerly;
            $calcNetSalary['monthly_expenses'] =  $request->monthly_expenses;
            $calcNetSalary['annual_requirements'] =  $request->annual_requirements;
            $calcNetSalary['insurance_amount'] =  $request->insurance_amount;
            $calcNetSalary['net_salary'] =  $salary_yaerly - ($request->annual_requirements + $request->insurance_amount
            +($request->monthly_expenses * $calcNetSalary['number_of_month']));

            $calcNetSalary->save();
            DB::commit();
            return redirect()->route('dashboard.calcNetSalary.index')->with('success','تم أضافة المرتب بنجاح');
        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->back()->withErrors(['error' => 'عفوآ لقد حدث خطأ ما: ' . $ex->getMessage()])->withInput();

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
    public function edit( $id)
    {
        $data = CalcNetSalary::findOrFail($id);
        $other['currencies'] = Currency::orderBy('id','DESC')->get();
        return view('dashboard.calcNetSalaries.edit',['other'=>$other,'data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            DB::beginTransaction();
            
            $calcNetSalaryUpdate = CalcNetSalary::findOrFail($id);
            
            $amount_currency = Currency::where('id',$request->currency_id)->value('amount');
            $calcNetSalaryUpdate['number_of_month'] = 12;
            
            if($amount_currency){
                $salary_monthly = $request['salary'] * $amount_currency;

                if($amount_currency){
                    $salary_yaerly = $salary_monthly * $calcNetSalaryUpdate['number_of_month'];
                }else{
                    $salary_yaerly = 0;
                }
            }else{
                $salary_monthly = 0;
            }

            $calcNetSalaryUpdate['currency_id'] =  $request->currency_id;
            $calcNetSalaryUpdate['salary'] =  $request->salary;
            $calcNetSalaryUpdate['calc_salary_month'] =  $salary_monthly;
            $calcNetSalaryUpdate['calc_salary_year'] =  $salary_yaerly;
            $calcNetSalaryUpdate['monthly_expenses'] =  $request->monthly_expenses;
            $calcNetSalaryUpdate['annual_requirements'] =  $request->annual_requirements;
            $calcNetSalaryUpdate['insurance_amount'] =  $request->insurance_amount;
            $calcNetSalaryUpdate['net_salary'] =  $salary_yaerly - ($request->annual_requirements + $request->insurance_amount
            +($request->monthly_expenses * $calcNetSalaryUpdate['number_of_month']));

            $calcNetSalaryUpdate->save();
            DB::commit();
            return redirect()->route('dashboard.calcNetSalary.index')->with('success','تم تعديل المرتب بنجاح');
        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->back()->withErrors(['error' => 'عفوآ لقد حدث خطأ ما: ' . $ex->getMessage()])->withInput();

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $calcNetSalaryDelete = CalcNetSalary::findOrFail($id);
        $calcNetSalaryDelete->delete();
        return redirect()->route('dashboard.calcNetSalary.index')->with('success','تم حذف المرتب بنجاح');

    }
}