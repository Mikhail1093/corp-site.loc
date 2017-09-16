<?php

namespace Nova\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class CommentValidate
 *
 * @package Nova\Http\Requests
 */
class CommentValidate extends FormRequest
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
            'email' => 'email'
        ];
    }
}
