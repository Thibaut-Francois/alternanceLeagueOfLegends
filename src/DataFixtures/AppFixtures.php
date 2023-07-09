<?php

namespace App\DataFixtures;

use App\Entity\Champion;
use App\Entity\ChoiceSynergy;
use App\Entity\Lane;
use App\Entity\Role;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        // ----------Insertion des roles
        $liste_roles=['Tank', 'Carry AP', 'Carry AD', 'Assassin', 'Healer'];
        foreach ($liste_roles as $i){
            $role = new Role();
            $role->setNom($i);

            $manager->persist($role);
        }

        // ----------Insertion des lanes
        $liste_lanes=['Top', 'Jungle', 'Mid', 'ADC', 'Support'];
        foreach ($liste_lanes as $i){
            $lane = new Lane();
            $lane->setNom($i);

            $manager->persist($lane);
        }

        $manager->flush();


        // ----------Insertion des scores de synergies
        $allLanes = $manager->getRepository(Lane::class)->findAll();
        $allRoles = $manager->getRepository(Role::class)->findAll();
        $score = [[15,10,10,5,0], [10,5,5,15,0], [0,15,10,15,5], [0,5,15,10,0], [15,10,0,5,15]];
        $i=0;
        foreach ($allLanes as $oneLane){
            $y=0;
            foreach ($allRoles as $oneRole){
                $synergy = new ChoiceSynergy();
                $synergy->setLane($oneLane);
                $synergy->setRole($oneRole);
                $synergy->setSynergy($score[$i][$y]);

                $manager->persist($synergy);

                $y++;
            }
            $i++;
        }

        // ----------Insertion des champions
        $liste_champions=[['Ahri', '../public/uploads/champions/ahri.jpg', 'Carry AP'], ['Braum', '../public/uploads/champions/braum.jpg', 'Tank']];
        foreach ($liste_champions as $oneChampion){
            $champion = new Champion();
            $champion->setNom($oneChampion[0]);
            $champion->setImage($oneChampion[1]);

            if ($oneChampion[2] === 'Carry AP'){
                $theRightRole = $manager->getRepository(Role::class)->findOneBy(array('nom' => 'Carry AP'));
                $champion->setRole($theRightRole);
            }elseif ($oneChampion[2] === 'Carry AD'){
                $theRightRole = $manager->getRepository(Role::class)->findOneBy(array('nom' => 'Carry AD'));
                $champion->setRole($theRightRole);
            }elseif ($oneChampion[2] === 'Tank'){
                $theRightRole = $manager->getRepository(Role::class)->findOneBy(array('nom' => 'Tank'));
                $champion->setRole($theRightRole);
            }elseif ($oneChampion[2] === 'Assassin'){
                $theRightRole = $manager->getRepository(Role::class)->findOneBy(array('nom' => 'Assassin'));
                $champion->setRole($theRightRole);
            }elseif ($oneChampion[2] === 'Healer'){
                $theRightRole = $manager->getRepository(Role::class)->findOneBy(array('nom' => 'Healer'));
                $champion->setRole($theRightRole);
            }

            $manager->persist($champion);
            $i++;
        }




        $manager->flush();
    }
}
