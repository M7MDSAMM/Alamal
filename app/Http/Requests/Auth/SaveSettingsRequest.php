<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;

class SaveSettingsRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;


    public function rules()
    {
        return [
            'name' => 'required|string|max:100',
            'image' => 'nullable|image|mimes:png,jpg,jpeg'
        ];
    }

    public function getParsedData(): array
    {
        $user = $this->user();
        $data = $this->validated();
        if ($this->hasFile('image')) {
            if ($user->image != null) {
                Storage::disk('public')->delete('' . $user->image);
            }
            $file = $this->file('image');
            $imageName = time() . '_' . $user->id . '_' . rand(1, 1000000) . '.' . $file->getClientOriginalExtension();
            $image = $file->storePubliclyAs('files/admins', $imageName, ['disk' => 'public']);
            $data['image'] = $image;
        }
        return $data;
    }
}
