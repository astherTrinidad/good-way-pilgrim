<?php

namespace App\Controller;

use App\Repository\LogroRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class logrosController extends AbstractController
{

    /**
     * @Route("/pub/logrosSummary", name="logrosSummary", methods={"GET"})
     */
    public function logrosSummary(Request $request, LogroRepository $logroRepository): Response
    {

        $logros = $logroRepository->getById($request->get('id'));

        if (!$logros) {
            $data = [
                'message' => 'no results found'
            ];
            return new JsonResponse($data, Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        if (count($logros) < 4) {
            return new JsonResponse($logros);
        } else {
            return new JsonResponse(array_slice($logros, 0, 3));
        }
    }
}
