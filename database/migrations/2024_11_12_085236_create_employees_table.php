<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            // $table->integer('employee_code')->nullable()->comment('كود الموظف التلقائي لايتغير');
            // $table->string("name", 300)->unique();
            // $table->tinyInteger('gender')->comment('1:Male,2:Female');
            // $table->foreignId("branch_id")->comment("الفرع التابع له الموظف ")->references("id")->on("branches")->onUpdate("cascade");
            // $table->foreignId("qualification_id")->nullable()->comment("المؤهل التعليمي")->references("id")->on("qualifications")->onUpdate("cascade");
            // $table->string("qualification_year", 10)->nullable()->comment("سنة التخرج");
            // $table->string("major", 225)->nullable()->comment("تخصص التخرج");
            // $table->enum("graduation_estimate", ['Fair', 'Good', 'Very_Good', 'Excellent'])->nullable()->comment("تقدير التخرج ")->default('Fair');
            // $table->date("brith_date")->nullable()->comment("تاريخ ميلاد الموظف");
            // $table->string("national_id", 50)->unique()->nullable()->comment("رقم البطاقة الشخصية - او رقم الهوية");
            // $table->date("end_national_id")->nullable()->comment("تاريخ نهاية البطاقة الشخصية - بطاقة الهوية");
            // $table->string("national_id_place", 225)->nullable()->comment("مكان اصدار بطاقة الهوية الشخصية");
            // $table->foreignId("blood_types_id")->nullable()->comment("فصيلة الدم")->references("id")->on("blood_types")->onUpdate("cascade");
            // $table->enum('religion', ['Muslim', 'Christian'])->nullable()->comment('حقل الديانة')->default('Muslim');
            // $table->foreignId("language_id")->nullable()->references("id")->on("languages")->onUpdate("cascade")->comment(" اللغه التي يتكلم بها الاساسية");
            // $table->string("email", 100)->unique()->nullable()->comment(" ايميل  الموظف");
            // $table->foreignId("country_id")->nullable()->comment("دولة الموظف")->references("id")->on("countries")->onUpdate("cascade");
            // $table->foreignId("governorate_id")->nullable()->comment("محافظة الموظف")->references("id")->on("governorates")->onUpdate("cascade");
            // $table->foreignId("city_id")->nullable()->comment("مدينة الموظف")->references("id")->on("cities")->onUpdate("cascade");
            // $table->string("home_telephone", 50)->nullable()->comment("رقم هاتف المنزل");
            // $table->string("work_telephone", 50)->nullable()->comment("رقم هاتف العمل");
            // $table->string("mobile", 50)->nullable()->comment("رقم هاتف المحمول");
            // $table->enum("military", ["Exemption", "Exemption_Temporary", "Complete"])->nullable()->comment("الحالة العسكرية")->default('Exemption_Temporary');
            // $table->date("military_date_from")->nullable()->comment("تاريخ بداية الخدمة العسكرية");
            // $table->date("military_date_to")->nullable()->comment("تاريخ نهاية الخدمة العسكرية");
            // $table->string("military_wepon", 500)->nullable()->comment("نوع سلاح الخدمة العسكرية");
            // $table->date("military_exemption_date")->nullable()->comment("تاريخ الاعفاء من الخدمه العسكرية");
            // $table->string("military_exemption_reason", 500)->nullable()->comment("سبب الاعفاء من الخدمه العسكرية ");
            // $table->string("military_postponement_reason", 500)->nullable()->comment("سبب التأجيل من الخدمه العسكرية ");
            // $table->date("date_resignation")->nullable()->comment("تاريخ ترك العمل");
            // $table->string("resignation_reason")->nullable()->comment("سبب ترك العمل");
            // $table->enum("driving_license", ["Yes", "No"])->nullable()->comment("هل يمتلك رخصه قياده")->default("No");
            // $table->enum('driving_license_type', ["Special", "First", "Second", "Third", "Fourth", "Pro", "Motorcycle"])->nullable()->comment("نوع رخصه القيادة")->default("Special");
            // $table->string("driving_License_id", 50)->nullable()->comment("رقم رخصه القيادة");
            // $table->enum("has_relatives", ["Yes", "No"])->nullable()->default("No")->comment("هل له اقارب بالعمل ");
            // $table->string("relatives_details", 600)->nullable()->comment("تفاصيل الاقارب بالعمل");
            // $table->text("notes")->nullable();
            // $table->date("work_start_date")->nullable()->comment("تاريخ بدء العمل للموظف");
            // $table->enum("functional_status", ["Employee", "Unemployed"])->default('Employee')->comment("حالة الموظف");
            // $table->foreignId("department_id")->references("id")->on("departments")->onUpdate("cascade");
            // $table->foreignId("job_categories_id")->nullable()->references("id")->on("jobs_categories")->onUpdate("cascade");
            // $table->enum("has_attendance", ["Yes", "No"])->nullable()->default("Yes")->comment("هل ملزم الموظف بعمل بصمه حضور وانصراف");
            // $table->enum("has_fixed_shift", ["Yes", "No"])->nullable()->comment("هل للموظف شفت ثابت")->default("Yes");
            // $table->foreignId("shift_types_id")->nullable()->references("id")->on("shifts_types")->onUpdate("cascade");
            // $table->decimal("daily_work_hour", 20, 2)->nullable()->comment("عدد ساعات العمل للموظف وهذا في حالة ان ليس له شفت ثابت");
            // $table->decimal("salary", 20, 2)->nullable()->default(0)->comment("راتب الموظف");
            // $table->decimal("day_price", 10, 2)->nullable()->comment("سعر يوم الموظف");
            // $table->enum("motivation_type", ["Changeable", "None", "Fixed"])->nullable()->default("Fixed")->comment("صفر لايوجد - واحد ثابت - اثنين متغير");
            // $table->decimal("motivation", 20, 2)->nullable()->default(0)->comment("قيمة الحافز الثابت ان وجد");
            // $table->enum("social_insurance", ["Yes", "No"])->nullable()->default("Yes")->comment("هل للموظف تأمين اجتماعي");
            // $table->decimal("social_insurance_cut_monthely", 20, 2)->nullable()->comment("  قيمة استقطاع التأمين الاجتماعي الشهري للموظف");
            // $table->string("social_insurance_number", 50)->nullable();
            // $table->enum("medical_insurance", ["Yes", "No"])->nullable()->default("Yes")->comment("هل للموظف تأمين طبي");
            // $table->decimal("medical_insurance_cut_monthely", 20, 2)->nullable()->comment("  قيمة استقطاع التأمين الطبي الشهري للموظف");
            // $table->string("medical_insurance_number", 50)->nullable();
            // $table->enum("Type_salary_receipt", ["Cach", "Visa"])->nullable()->default("Visa")->comment("نوع صرف الراتب - واحد كاش - اثنين فيزا بنكي");
            // $table->enum("active_vacation", ["Yes", "No"])->nullable()->default("Yes")->comment("هل هذا الموظف ينزل له رصيد اجازات	");
            // $table->string("urgent_person_details", 600)->nullable()->comment("تفاصيل شخص يمكن الرجوع اليه للوصول للموظف");
            // $table->text("staies_address")->nullable()->comment("عنوان الاقامة الفعلي للموظف");
            // $table->integer('children_number')->nullable()->default(0);
            // $table->enum("social_status", ["Divorced", "Married", "Single", "Widowed"])->nullable()->default("Single")->comment("الحالة الاجتماعية");
            // $table->foreignId("resignation_id")->nullable()->references("id")->on("resignations")->onUpdate("cascade");
            // $table->string("bank_number_account", 50)->nullable()->comment("رقم حساب البنك للموظف");
            // $table->enum("disabilities", ["Yes", "No"])->nullable()->default("Yes")->comment("هل له اعاقة  - واحد يوجد صفر لايوجد");
            // $table->string("disabilities_type", 500)->nullable()->comment("نوع الاعاقة");
            // $table->foreignId("nationality_id")->nullable()->references("id")->on("nationalities")->onUpdate("cascade");
            // $table->string("name_sponsor")->nullable()->comment("اسم الكفيل ");
            // $table->string("pasport_identity", 100)->nullable()->comment("رقم الباسبور ان وجد");
            // $table->string("pasport_from_place", 100)->nullable()->comment("مكان استخراج الباسبور");
            // $table->date("pasport_exp_date")->nullable()->comment("تاريخ انتهاء الباسبور");


            // // Vacation
            // $table->string('num_vacation_days')->nullable()->comment('عدد ايام رصيد الأجازات');
            // $table->string('add_service')->nullable()->comment('أضافة خدمه مثل 3 سنوات تجنيد');
            // $table->string('years_service')->nullable()->comment('عدد سنوات الخدمه بالشركة');


            // $table->string('cv', 100)->nullable();
            // $table->string("basic_address_country", 300)->nullable()->comment("عنوان اقامة الموظف في بلده الام");
            // // $table->date("date");
            // $table->integer("fixed_allowances")->nullable()->default(0)->comment("هل له بدلات ثابته");
            // $table->tinyInteger("is_done_Vacation_formula")->nullable()->default(0)->comment("هل تمت المعادله التلقائية لاحتساب الرصيد السنوي للموظف");
            // $table->tinyInteger("is_Sensitive_manager_data")->nullable()->default(0)->comment("هل بيانات حساساه للمديرين مثلا ولاتظهر الا بصلاحيات خاصة	");
            // $table->foreignId("created_by")->references("id")->on("admins")->onUpdate("cascade");
            // $table->foreignId("updated_by")->nullable()->references("id")->on("admins")->onUpdate("cascade");
            // $table->integer("com_code");
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};