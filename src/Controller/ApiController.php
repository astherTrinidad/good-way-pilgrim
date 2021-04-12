<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Description of ApiController
 *
 * @author Cloud District
 */
class ApiController {

    /**
     * @Route("/api/test", name="testapi")
     */
    public function test() {
        return $this->json([
                    'message' => 'test!',
        ]);
    }

}
