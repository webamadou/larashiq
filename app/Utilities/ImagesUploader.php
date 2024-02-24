<?php

namespace App\Utilities;

use App\Models\Image;
use App\Traits\ImageUtilities;
use Illuminate\Http\Request;
use Image as ImageManager;

class ImagesUploader
{
    use ImageUtilities;

    public function __construct(
        public Request $request,
        public int $imageableId,
        public string $imageableType
    ) {
        // We make sure the folder exists
        if (! is_dir(Image::IMAGE_MAIN_FOLDER)) {
            mkdir(Image::IMAGE_MAIN_FOLDER, 0777, true);
        }
        if (! is_dir(Image::IMAGE_MEDIUM_FOLDER)) {
            mkdir(Image::IMAGE_MEDIUM_FOLDER, 0777, true);
        }
        if (! is_dir(Image::IMAGE_THUMBNAIL_FOLDER)) {
            mkdir(Image::IMAGE_THUMBNAIL_FOLDER, 0777, true);
        }
    }

    /**
     * This method will manage all the actions needed to upload images and save them
     * To the polymorphe table
     * @return array
     */
    public function __invoke()
    {
        $images = (! is_array($this->request->file('images')))
            ? [$this->request->file('images')]
            : $this->request->file('images');

        foreach ($images as $file) {
            if (empty($file)) {
                continue;
            }
            $filename= md5(date('YmdHi')) . "--".str_replace(' ', '-', $file?->getClientOriginalName());
            $managedImage = ImageManager::make($file);

            // We use the method that will compress and save the file
            $this->manageGivenImage($managedImage, $filename);

            $image                  = new Image();
            $image->url             = asset(Image::IMAGE_MAIN_FOLDER.$filename);
            $image->imageable_id    = $this->imageableId;
            $image->imageable_type  = $this->imageableType;

            if (! $errorSaving = $image->save()) {
                return [false, "Error while saving images<br>$errorSaving"];
            }
        }

        return [true,  ''];
    }
}
