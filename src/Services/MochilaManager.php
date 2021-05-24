<?php

namespace App\Services;

use App\Repository\MochilaRepository;

class MochilaManager {

    private $mochilaRepository;

    function __construct(MochilaRepository $mochilaRepository) {
        $this->mochilaRepository = $mochilaRepository;
    }

    public function getMyBackpacks($idUser) {
        return $this->mochilaRepository->getMyBackpacks($idUser);
    }

    public function getInfoBackpack($idUser, $idCamino) {
        return $this->mochilaRepository->getInfoBackpack($idUser, $idCamino);        
    }

    public function createBackpack() {

    }
    
    public function mochilaExists($idUser, $idCamino) {
        return $this->mochilaRepository->mochilaExists($idUser, $idCamino);
    }

    public function deleteBackpack($idUser, $idCamino) {
        return $this->mochilaRepository->deleteBackpack($idUser, $idCamino);        
    }   
    
    public function addItem() {
        
    }
    
    public function editItem() {
        
    }
    
    public function deleteItem() {
        
    }
   

}
