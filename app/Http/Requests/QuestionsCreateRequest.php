<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionsCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'question'=>'required|min:3',
            'image'=>'image|nullable|max:1024|mimes:jpg,jpeg,bmp,png',
            'answer1'=>'required',
            'answer2'=>'required',
            'answer3'=>'required',
            'answer4'=>'required',
            'correct_answer'=>'required',
        ];
    }
}
