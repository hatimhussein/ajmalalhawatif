<?php

namespace Modules\CommonModule\Helper;

use Exception;
use Illuminate\Http\Request;
use Image;

trait UploaderHelper
{
    /**
     * upload file through $request, Compress it.
     * to the server in public folder: /public/images/{categoryNameFolder}.
     * if_not_exist : create it with 775 permission.
     *
     * @param $imageFromRequest
     * @param $imageFolder
     * @param bool $resize
     * @return string
     */
    public function upload($imageFromRequest, $imageFolder, $resize = false)
    {
        try {
            $fileName = time() . $imageFromRequest->getClientOriginalName();
            $location = public_path('images/' . $imageFolder . '/' . $fileName);


            $image = Image::make($imageFromRequest);
            $image->save($location);

            # Optional Resize.
            if ($resize == true) {
                $image->resize(600, 600);
                $newlocation = public_path('images/' . $imageFolder . '/' . $fileName);
                $image->save($newlocation);
            }
            return $fileName;

        } catch (Exception $e) {

        }
    }

    public function uploadFile($fileFromRequest, $fileFolder): string
    {
        $fileName = uniqid(time()) . $fileFromRequest->getClientOriginalName();
        $location = public_path('files/' . $fileFolder . '/');
        $fileFromRequest->move($location, $fileName);

        return $fileName;
    }

    public function uploadVideo($videoFromRequest, $videoFolder): string
    {
        try {
            $fileName = uniqid(time()) . $videoFromRequest->getClientOriginalName();
            $location = public_path('images/' . $videoFolder . '/');
            $videoFromRequest->move($location, $fileName);

            return $fileName;
        } catch (Exception $e) {

        }
    }

    /**
     * Call upload() func to upload photo album.
     *
     * @param [type] $photos
     * @return array
     */
    public function uploadAlbum($photos, $folder = 'product')
    {
        $product_photos = array();
        foreach ($photos as $album) {
            $imageName = $this->upload($album, $folder);
            $product_photos[] = $imageName;
        }
        return $product_photos;
    }

    public function uploadAlbumm($photos, $folder = 'product')
    {
        $product_photos = array();
        foreach ($photos as $album) {
            $imageName = $this->uploadFile($album, $folder);
            $product_photos[] = $imageName;
        }
        return $product_photos;
    }
}
