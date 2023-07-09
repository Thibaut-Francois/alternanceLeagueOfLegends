<?php

namespace App\Controller;

use App\Repository\ChampionRepository;
use App\Repository\RoleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
    public function index(ChampionRepository $championRepository): Response
    {
        return $this->render('app/index.html.twig', [
            'champions' => $championRepository->findAll(),
        ]);
    }
}
