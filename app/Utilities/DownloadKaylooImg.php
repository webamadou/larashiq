<?php

namespace App\Utilities;

use App\Models\Image;
use App\Traits\ImageUtilities;
use GuzzleHttp\Client;
use Image as ImageManager;

class DownloadKaylooImg
{
    use ImageUtilities;

    public function __construct(public readonly string $imageURL)
    {
        // We make sure the folder exists
        if (! is_dir(public_path(Image::IMAGE_MAIN_FOLDER))) {
            mkdir(public_path(Image::IMAGE_MAIN_FOLDER), 0777, true);
        }
        if (! is_dir(public_path(Image::IMAGE_MEDIUM_FOLDER))) {
            mkdir(public_path(Image::IMAGE_MEDIUM_FOLDER), 0777, true);
        }
        if (! is_dir(public_path(Image::IMAGE_THUMBNAIL_FOLDER))) {
            mkdir(public_path(Image::IMAGE_THUMBNAIL_FOLDER), 0777, true);
        }
    }

    public function __invoke(): string
    {
        $client = new Client();
        $response = $client->get($this->imageURL);

        if ($response->getStatusCode() === 200) {
            $imageContents = $response->getBody()->getContents();

            // get the extension of the image
            $contentType = $response->getHeader('content-type');
            $extension = explode('/', $contentType[0])[1];

            // get file's name
            $parsedURL = parse_url($this->imageURL);
            $path = $parsedURL['path'];
            $filename = basename($path) . '.' . $extension;

            $managedImage = ImageManager::make($imageContents);

            // We use the method that will compress and save the file
            $this->manageGivenImage($managedImage, $filename);

            return asset(Image::IMAGE_MAIN_FOLDER) . '/' . $filename;
        }
    }
}
