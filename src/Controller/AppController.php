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
    public function api(ChampionRepository $championRepository): JsonResponse
    {
        return $this->json(
            $table=[
                //'champions' => $championRepository->findAll(),

                'champ_selected'=> [
                    [
                        'nom'=>'Ahri',
                        'img'=>'/uploads/champions/ahri.jpg',
                        'role'=>'Carry AP'
                    ],
                    [
                        'nom'=>'Braum',
                        'img'=>'/uploads/champions/braum.jpg',
                        'role'=>'Tank'
                    ],
                    [
                        'nom'=>'Caitlyn',
                        'img'=>'/uploads/champions/caitlyn.jpg',
                        'role'=>'Carry AD'
                    ],
                    [
                        'nom'=>'Dr. Mundo',
                        'img'=>'/uploads/champions/dr.mundo.jpg',
                        'role'=>'Tank'
                    ],
                    [
                        'nom'=>'Shaco',
                        'img'=>'/uploads/champions/shaco.jpg',
                        'role'=>'Assassin'
                    ],
                ],

                'champ_not_selected'=> [
                    [
                        'nom'=>'Janna',
                        'img'=>'/uploads/champions/janna.jpg',
                        'role'=>'Healer'
                    ],
                ],
            ]
        );
    }
}
