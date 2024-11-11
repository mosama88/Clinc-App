<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CurrencyRequest extends FormRequest
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
            'name'=>'required|max:50',
            'description'=>'required|max:150',
            'amount'=>'required|max:10',
        ];
    }

    public function messages():array{
        return[
           'name.required' => "يرجى كتابة اسم العملة",
            'name.max' => "اسم العملة يجب ألا يزيد عن الحد 50 المسموح",
            'description.required' => "يرجى كتابة وصف للعملة",
            'description.max' => "الوصف يجب ألا يزيد عن الحد 150 المسموح",
            'amount.required' => "يرجى كتابة قيمة المبلغ",
            'amount.max' => "قيمة المبلغ يجب ألا تزيد عن الحد 10 المسموح",

        ];
    }
}