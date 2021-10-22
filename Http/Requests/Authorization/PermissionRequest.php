<?php

namespace Modules\Backend\Http\Requests\Authorization;

use Illuminate\Foundation\Http\FormRequest;

class PermissionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * check using laravel polices
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return request()->user()->can('permissions.store') ||
            request()->user()->can('permissions.update');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'display_name' => 'required|string|min:3|max:255',
            'name' => 'required|string|min:3|max:255',
            'guard_name' => 'nullable|string|min:3|max:255',
            'enabled' => 'required|string|min:2|max:3',
            'remarks' => 'nullable|string|min:3|max:255',

        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'guard_name' => 'Guard',
            'name' => 'Permission Code'
        ];
    }

}
