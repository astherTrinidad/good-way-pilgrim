<?php

namespace App\Controller;

use App\Repository\CaminoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class caminosController extends AbstractController {

    /**
     * @Route("/pub/csv_download", name="csv_download", methods={"GET"})
     */
    public function descargarCSV(CaminoRepository $caminoRepository): Response {

        $caminos = $caminoRepository->getAll();

        $fp = fopen('php://output', 'w');

        foreach ($caminos as $camino) {
            $data = [utf8_decode($camino->getName()), utf8_decode($camino->getStart()), utf8_decode($camino->getFinish()), $camino->getNumEtapas(), $camino->getKm(), utf8_decode($camino->getDescription())];
            fputcsv($fp, $data);
        }

        $response = new Response();
        $response->headers->set('Content-Type', 'text/csv');
        $response->headers->set('Content-Disposition', 'attachment; filename="GoodWayPilgrim_caminos.csv"');

        return $response;
    }

}
