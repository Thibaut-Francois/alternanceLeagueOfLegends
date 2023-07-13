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
        $liste_champions=[
            ['Ahri', 'https://images.contentstack.io/v3/assets/blt731acb42bb3d1659/blt1259276b6d1efa78/5db05fa86e8b0c6d038c5ca2/RiotX_ChampionList_ahri.jpg?quality=90&width=250', 'Carry AP'],
            ['Braum', 'https://images.contentstack.io/v3/assets/blt731acb42bb3d1659/bltd140e30fa86d6ddd/5db05fb2242f426df132f95d/RiotX_ChampionList_braum.jpg?quality=90&width=250', 'Tank'],
            ['Caitlyn', 'https://images.contentstack.io/v3/assets/blt731acb42bb3d1659/blt014f4b6fc9bacd10/61b1eb901d158d4007de9685/RiotX_ChampionList_caitlyn_v2.jpg?quality=90&width=250', 'Carry AD'],
            ['Dr. Mundo', 'https://images.contentstack.io/v3/assets/blt731acb42bb3d1659/blte88a3d7e9e408904/61b1ea136a78b87751002a68/RiotX_ChampionList_drmundo_v2.jpg?quality=90&width=250', 'Tank'],
            ['Janna', 'https://images.contentstack.io/v3/assets/blt731acb42bb3d1659/blt02bf5329f8abe45d/5db05fcedf78486c826dcd06/RiotX_ChampionList_janna.jpg?quality=90&width=250', 'Healer'],
            ['Shaco', 'https://images.contentstack.io/v3/assets/blt731acb42bb3d1659/bltc8b1d1ba926d01cc/5db060036e8b0c6d038c5cba/RiotX_ChampionList_shaco.jpg?quality=90&width=250', 'Assassin'],
            ];
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
