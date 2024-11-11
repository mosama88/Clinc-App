<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class AdminPanelRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'company_name' => 'required|max:50',
            'description' => 'required|max:150',
            'amount' => 'required|max:10',
        ];
    }

    public function messages(): array
    {
        return [
            'company_name.required' => "يرجى كتابة اسم الشركة",
            'company_name.max' => "اسم الشركة يجب ألا يزيد عن الحد 50 المسموح",
            'description.required' => "يرجى كتابة وصف للعملة",
            'description.max' => "الوصف يجب ألا يزيد عن الحد 150 المسموح",
            'amount.required' => "يرجى كتابة قيمة المبلغ",
            'amount.max' => "قيمة المبلغ يجب ألا تزيد عن الحد 10 المسموح",

        ];
    }
}
