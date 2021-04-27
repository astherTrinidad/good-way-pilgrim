<?php

namespace App\Controller;

use App\Entity\Usuario;


class imageController
{

    private $imageUser;

    /**
     * @Route("/pub/csv_download", name="csv_download", methods={"GET"})
     */
    public static function imageUser($imageBase64) //crear usuario
    {
        $direction = __DIR__ . "'/../../app/resources/";

        $extension = "";
        $fileName = $direction . uniqid() . "." . $extension;
        return "prub";
    }
}
