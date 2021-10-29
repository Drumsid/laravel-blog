<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OriginalSongRequest extends FormRequest
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
            'title' => 'required|min:3',
            'song_id' => 'required',
            'song_name' => 'required|mimes:mp3,ogg',
        ];
    }
}
