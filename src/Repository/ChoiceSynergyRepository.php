<?php

namespace App\Repository;

use App\Entity\ChoiceSynergy;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ChoiceSynergy>
 *
 * @method ChoiceSynergy|null find($id, $lockMode = null, $lockVersion = null)
 * @method ChoiceSynergy|null findOneBy(array $criteria, array $orderBy = null)
 * @method ChoiceSynergy[]    findAll()
 * @method ChoiceSynergy[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChoiceSynergyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ChoiceSynergy::class);
    }

    public function save(ChoiceSynergy $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ChoiceSynergy $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return ChoiceSynergy[] Returns an array of ChoiceSynergy objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ChoiceSynergy
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
