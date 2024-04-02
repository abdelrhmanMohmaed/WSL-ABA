<?php

namespace App\Http\Traits;
use App\Models\Files;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

trait UploadTrait
{
    function uploads(string $folderName, $attachment, $id): void
    {
        $file = $attachment;

        $name = date('d-m-y') . time() . rand() . '.' . $file->getClientOriginalExtension();
        $destinationPath = $folderName;
        $file->move($destinationPath, $name);

        $fil = new Files();
        $fil->file = $name;
        $fil->user_id = $id;
        $fil->save();
    }

    function uploadAvatar($currentAvatar, string $folderName, $newAvatar)
    {
        # delete avatar
        if ($currentAvatar->avatar !== 'default.png') {
            File::delete($folderName . $currentAvatar->avatar);
        }
        # upload new avatar
        $photo = $newAvatar;
        $name = date('d-m-y') . time() . rand() . '.' . $photo->getClientOriginalExtension();
        Image::make($photo)->save($folderName . $name);
        $currentAvatar->avatar = $name;
    }

}
