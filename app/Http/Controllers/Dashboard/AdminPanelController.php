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
        $updateAdminPanel['phones'] = $request->phones;
        $updateAdminPanel['address'] = $request->address;
        $updateAdminPanel['email'] = $request->email;
        $updateAdminPanel['updated_by'] = auth()->user()->id;
        $updateAdminPanel['com_code'] = $com_code;
     $adminPanel =    $updateAdminPanel->save();

// التحقق من وجود الصورة وتحديثها
if ($request->hasFile('photo')) {
    $request->validate([
        'photo' => 'nullable|mimes:png,jpg,jpeg|max:5000',
    ], [
        'photo.mimes' => 'الملفات المسموح بها يجب ان تكون من نوع png,jpg,jpeg',
        'photo.max' => 'اقصى مساحة للملف 5 ميجا',
    ]);

    // حذف الصورة القديمة إذا كانت موجودة
    if ($updateAdminPanel->photo) {
        $old_image_path = public_path('dashboard/assets/uploads/admin_setting/' . $updateAdminPanel->photo);
        if (file_exists($old_image_path)) {
            unlink($old_image_path);
        }
    }

    // رفع الصورة الجديدة وتخزين مسارها
    $the_file_path = uploadImage('dashboard/assets/uploads/admin_setting', $request->file('photo'));
    $updateAdminPanel->photo = $the_file_path;
    $updateAdminPanel->save(); // حفظ البيانات والصورة بعد التحديث
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