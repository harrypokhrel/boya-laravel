<?php
namespace App\Http\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

trait ImageTrait
{
    public function storeOrUpdate($folderPath, $image, $oldImage = '') : string
    {
        $filename = time().'.'.$image->extension();
        $image->move(public_path('images/activities'), $filename);

        // if (!file_exists($folderPath)) Storage::makeDirectory($folderPath, 0777, true, true);

        // $filename = time() . '.' . $image->getClientOriginalExtension();

        // Storage::putFileAs($folderPath, new File($image), $filename);
        // if($oldImage !== '') Storage::delete($folderPath . $oldImage);

        return $filename;
    }
}