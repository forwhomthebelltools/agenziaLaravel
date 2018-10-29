<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Product;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    //funzione che protegge dal furto del token hidden
    public function authorize()
    {
        $currentUser = Auth::user();
        if ($currentUser) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:60',
            'price' => 'required',
            'description' => 'required|max:255',
            'immagine' => 'required|image',
        ];
    }
}
