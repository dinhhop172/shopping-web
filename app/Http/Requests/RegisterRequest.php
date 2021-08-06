<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|unique:customers,name|max:20|min:3',
            'email' => 'required|unique:customers,email|email',
            'phone' => 'required|unique:customers,phone|numeric|digits:10',
            'password' => 'required|min:6|max:20',
            're-password' => 'required|same:password',
            'address' => 'required|max:100',
        ];
    }

    // public function messages()
    // {
    //     return [
    //         'name.required' => 'Không được để trống',
    //         'name.max' => 'Tên không được quá 20 kí tự',
    //         'name.max' => 'Tên tối thiểu 3 kí tự',
    //         'phone.required' => 'Số điện thoại không được để trống',
    //         'phone.max' => 'Số điện thoại không được quá 10 số',
    //         'phone.numeric' => 'Số điện thoại phải ở dạng số',
    //         'password.required' => 'Mật khẩu không được để trống',
    //         'password.max' => 'Mật khẩu tối đa 10 kí tự',
    //         'password.min' => 'Mật khẩu ít nhất là 5 kí tự',
    //         'rePassword.required' => 'Mật khẩu không được để trống',
    //         'rePassword.same' => 'Mật khẩu nhập lại không khớp',
    //         'email.required' => 'Email không được để trống',
    //         'email.email' => 'Sai định dạng, phải là ...@example.com',
    //         'email.unique' => 'Email đã tồn tại, vui lòng nhập 1 email khác',
    //         'address.required' => 'Địa chỉ không được để trống',
    //         'address.max' =>  'Địa chỉ không được quá 100 kí tự'
    //     ];
    // }
}
