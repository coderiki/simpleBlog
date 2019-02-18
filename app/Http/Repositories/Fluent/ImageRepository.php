<?php
/**
 * Created by PhpStorm.
 * User: CoDe
 * Date: 13.02.2019
 * Time: 16:21
 */

namespace App\Http\Repositories\Fluent;


use App\Contracts\ImageContract;
use test\Mockery\ArgumentObjectTypeHint;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;


class ImageRepository implements ImageContract
{

    public function store($requestImage, $slug)
    {
        // TODO: Implement store() method.
        $image = $requestImage["image"];

        $imageName = $this->createImageName($image->getClientOriginalExtension(), $slug);

        $saveDirectory = $this->createFolderPath();  // Image kaydedilecek dizin image/upload/yıl/ay/gün/

        $mediaPath = $saveDirectory . $imageName;    // Veritabanına kaydedilecek olan image/upload/yıl/ay/gün/imageName.jpg

        $this->checkSavePathExistOrCreate($saveDirectory);

        Image::make($image->getRealPath())->resize(750, 300, function ($constraint) {
            $constraint->aspectRatio();
        })->save(public_path($mediaPath));  // public path ile disk içindeki tam konumu belirtildi.

        return $mediaPath;
    }

    public function destroy($mediaPath)
    {
        // TODO: Implement destroy() method.
        if ($mediaPath == Session::get('settings.0.defaultPostImage', 'image/web/no-image-min.png') ) {
            return false;
        }
        $image_path = public_path($mediaPath);

        return $this->deleteFile($image_path);
    }

    public function update()
    {
        // TODO: Implement update() method.
    }

    protected function createImageName($originalExtension, $slug)
    {
        return $slug."-".time().".".$originalExtension;
    }

    protected function createFolderPath()
    {
        $ds = DIRECTORY_SEPARATOR;
        return "image" . $ds . "upload" . $ds . date("Y") . $ds . date("m") . $ds . date("d") . $ds;
    }

    protected function checkSavePathExistOrCreate($savePath)
    {
        if (!file_exists(public_path($savePath))) {
            mkdir(public_path($savePath), 666, true);
        }
    }

    public function deleteFile($image_path)
    {
        if(File::exists($image_path)) {
            File::delete($image_path);
            return true;
        } else {
            return false;
        }
    }
}