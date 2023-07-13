<?php

namespace App\Controller;

use App\Repository\ChampionRepository;
use App\Repository\LaneRepository;
use App\Repository\RoleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController
{
//    #[Route('/', name: 'app_app')]
//    public function index(): Response
//    {
//        return $this->render('app/index.html.twig', [
//            'roles' => Role->findAll(),
//        ]);
//    }

    #[Route('/', name: 'app_index')]
    public function index(ChampionRepository $championRepository, LaneRepository $laneRepository): Response
    {
        return $this->render('app/index.html.twig', [
            'champions' => $championRepository->findAll(),
            'lanes' => $laneRepository->findAll(),
        ]);
    }

    #[Route('/api', name: 'app_api')]
    public function api(): JsonResponse
    {
        return $this->json(
            $table=[
                'champ_selected'=> [
                    [
                        'nom'=>'perso 1',
                        'id'=>1,
                    ],
                    [
                        'nom'=>'perso 2',
                        'id'=>2,
                    ],
                ],

                'champ_not_selected'=> [
                    [
                        'nom'=>'perso 3',
                        'id'=>3,
                    ],
                    [
                        'nom'=>'perso 4',
                        'id'=>4,
                    ],
                ],
            ]
        );
    }
}
