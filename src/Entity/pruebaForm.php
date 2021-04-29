<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Entity;

/**
 * Description of pruebaForm
 *
 * @author Cloud District
 */
class pruebaForm {
    /**
     * @ORM\Column(type="string", length=30)
     */
    private $achievement;
    
    function getAchievement() {
        return $this->achievement;
    }

    function setAchievement($achievement): void {
        $this->achievement = $achievement;
    }


}
