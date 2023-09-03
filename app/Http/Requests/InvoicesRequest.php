<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvoicesRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "invoice_number"=>'required',
            "invoice_Date"=>'required|date',
            "Due_date"=>'required|date',
            "product"=>'required',
            "Section"=>'required|integer',
            "Amount_collection"=>'required|min:2',
            "Amount_Commission"=>'required|min:2',
            "Rate_VAT"=>'required',
            "Value_VAT"=>'required',
            "Total"=>'required',
            "uplodedFile"=>'mimes:pdf,jpeg,png,jpg',
        ];
    }

    public function messages() : array
    {
        return
        [
            'invoice_number.required'=>'رقم الفاتورة مطلوب',
            'invoice_Date.required'=>'تاريخ الفاتورة مطلوب',
            'invoice_Date.date'=>'تاريخ الفاتورة يجب ان يكون تاريخ ',
            'Due_date.required'=>'تاريخ الاستحقاق مطلوب',
            'Due_date.date'=>'تاريخ الاستحقاق يجب ان يكون تاريخ ',
            'product.required'=> 'اسم المنتج مطلوب',
            'Section.required'=>'يرجي اختيار القسم',
            'Amount_collection.required'=>'مبلغ التحصيل مطلوب',
            'Amount_collection.min'=>'مبلغ التحصيل يجب ان يكون اكبر من او يساوي رقمين',
            'Amount_Commission.required'=>'مبلغ العمولة مطلوب',
            'Amount_Commission.min'=>'مبلغ العمولة يجب ان يكون اكبر من او يساوي رقمين',
            'Rate_VAT.required'=>'برجاء اختيار معدل الضريبة',
            'Value_VAT.required'=>'قيمة الضريبة مطلوبة',
            'Total.required'=>'الاجمالي  شامل الضريبة  مطلوب',
            'uplodedFile.mimes'=>'صيغة الملف يجب ان تكون pdf,jpeg,jpg,png',
        ];
    }
}
