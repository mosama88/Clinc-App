<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\AdminPanel;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\AdminPanelRequest;

class AdminPanelController extends Controller
{
  
    
    use UploadTrait;

    
    public function index()
    {
        $com_code = auth()->user()->com_code;
        $data = AdminPanel::select('*')->where('com_code', $com_code)->first();
        return view('dashboard.admin_panels.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function edit($id)
    {
        $editData = AdminPanel::findOrFail($id);
        return view('dashboard.admin_panels.edit', compact('editData'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminPanelRequest $request, $id)
    {
        $com_code = auth()->user()->com_code;
        $updateAdminPanel = AdminPanel::findOrFail($id);
        $updateAdminPanel['company_name'] = $request->company_name;
        $updateAdminPanel['system_status'] = $request->system_status;
        $updateAdminPanel['phons'] = $request->phons;
        $updateAdminPanel['address'] = $request->address;
        $updateAdminPanel['email'] = $request->email;
        $updateAdminPanel['updated_by'] = auth()->user()->id;
        $updateAdminPanel['com_code'] = $com_code;
     $adminPanel =    $updateAdminPanel->save();

// التحقق من وجود الصورة وتحديثها إذا لزم الأمر
if ($request->hasFile('photo')) { // التحقق من وجود ملف في الحقل photo
    // حذف الصورة القديمة إذا وجدت
    if ($updateAdminPanel->image) {
        $old_img_path = public_path('dashboard/assets/uploads/admin_setting/' . $updateAdminPanel->image);
        if (file_exists($old_img_path)) {
            unlink($old_img_path); // حذف الملف الفعلي
        }
        $updateAdminPanel->image = null; // تحديث الحقل في قاعدة البيانات
    }

    // رفع الصورة الجديدة وتخزينها
    $file = $request->file('photo');
    $fileName = time() . '.' . $file->getClientOriginalExtension();
    $file->move(public_path('dashboard/assets/uploads/admin_setting'), $fileName);

    // تحديث حقل الصورة في الجدول
    $updateAdminPanel->image = $fileName;
    $updateAdminPanel->save();
}
        

        
        return redirect()->route('dashboard.admin_panels.index')->with('success', 'تم تعديل بيانات الشركة بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}