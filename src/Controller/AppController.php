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
                        'nom'=>'Ahri',
                        'img'=>'https://images.contentstack.io/v3/assets/blt731acb42bb3d1659/blt1259276b6d1efa78/5db05fa86e8b0c6d038c5ca2/RiotX_ChampionList_ahri.jpg?quality=90&width=250',
                        'role'=>'Carry AP'
                    ],
                    [
                        'nom'=>'Braum',
                        'img'=>'https://images.contentstack.io/v3/assets/blt731acb42bb3d1659/bltd140e30fa86d6ddd/5db05fb2242f426df132f95d/RiotX_ChampionList_braum.jpg?quality=90&width=250',
                        'role'=>'Tank'
                    ],
                    [
                        'nom'=>'Caitlyn',
                        'img'=>'https://images.contentstack.io/v3/assets/blt731acb42bb3d1659/blt014f4b6fc9bacd10/61b1eb901d158d4007de9685/RiotX_ChampionList_caitlyn_v2.jpg?quality=90&width=250',
                        'role'=>'Carry AD'
                    ],
                    [
                        'nom'=>'Dr. Mundo',
                        'img'=>'https://images.contentstack.io/v3/assets/blt731acb42bb3d1659/blte88a3d7e9e408904/61b1ea136a78b87751002a68/RiotX_ChampionList_drmundo_v2.jpg?quality=90&width=250',
                        'role'=>'Tank'
                    ],
                    [
                        'nom'=>'Shaco',
                        'img'=>'https://images.contentstack.io/v3/assets/blt731acb42bb3d1659/bltc8b1d1ba926d01cc/5db060036e8b0c6d038c5cba/RiotX_ChampionList_shaco.jpg?quality=90&width=250',
                        'role'=>'Assassin'
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
