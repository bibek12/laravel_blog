<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class UserDestoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return !($this->route('user')==config('cms.default_user_id')|| $this->route('user')==auth()->user()->id);
    }

    public function forbiddenResponse(){
        return redirect()->back()->with('error-message','You cannot delete default user and yourself');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
