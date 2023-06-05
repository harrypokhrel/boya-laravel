<?php
namespace App\Http\Traits;

trait SlugTrait
{

    public function createSlug($model, $title) : string
    {
        // Normalize the title
        $slug = str_slug($title);
        $allSlugs = $model::select('slug')->where('slug', 'like', $slug . '%')->withTrashed()->get();

        // If we haven't used it before then we are all good.
        if (!$allSlugs->contains('slug', $slug)) {
            return $slug;
        }

        // Just append numbers like a savage until we find not used.
        $i = 1;
        do{
            $newSlug = $slug . '-' . $i;
            if (!$allSlugs->contains('slug', $newSlug)) {
                return $newSlug;
            }
            $i++;
        }while($allSlugs->contains('slug', $newSlug));
    }
}