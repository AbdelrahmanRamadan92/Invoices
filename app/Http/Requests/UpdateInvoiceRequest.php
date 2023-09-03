<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInvoiceRequest extends FormRequest
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
            "invoice_number"=>['required'],
            "invoice_Date"=>['required','date'],
            "Due_date"=>['required','date'],
            "product"=>['required'],
            "Section"=>['required','integer'],
            "Amount_collection"=>['required','min:2'],
            "Amount_Commission"=>['required','min:2'],
            "Rate_VAT"=>['required'],
            "Value_VAT"=>['required'],
            "Total"=>['required'],
            "uplodedFile"=>['mimes:pdf,jpeg,png,jpg'],
        ];  
    }
}
