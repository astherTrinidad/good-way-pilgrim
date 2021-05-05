<?php

namespace App\Controller;


class CoverImageController
{

    public static function saveImageUser($imageBase64)
    {
        $direction = __DIR__ . '/../../app/resources';
        $extension = explode("/", mime_content_type($imageBase64));
        $extensionFile = $extension[1];
        $fileName = uniqid() . "." . $extensionFile;
        $folder = $direction . "/" . $fileName;
        $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imageBase64));
        file_put_contents($folder, $data);

        return $folder;
    }

    public static function showImageUser($urlPicture)
    {
        $path = $urlPicture;
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

        return $base64;
    }
}
