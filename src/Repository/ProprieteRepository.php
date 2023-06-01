<?php

namespace App\Repository;

use App\Entity\Propriete;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Propriete>
 *
 * @method Propriete|null find($id, $lockMode = null, $lockVersion = null)
 * @method Propriete|null findOneBy(array $criteria, array $orderBy = null)
 * @method Propriete[]    findAll()
 * @method Propriete[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProprieteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Propriete::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Propriete $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(Propriete $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @return Propriete[]
     */
    public function trouveLesDerniers() : array {
        return $this->createQueryBuilder("p")
        ->orderBy("p.depose_a", "DESC")
        ->setMaxResults(4)
        ->getQuery()
        ->getResult();
    }

    /**
     * @return Propriete[]
     */
    public function trouveEtOrdonneParNotesDesc() : array {
        return $this->createQueryBuilder("p")
        ->orderBy("p.nombre_etoiles", "DESC")
        ->getQuery()
        ->getResult();
    }

    // /**
    //  * @return Propriete[] Returns an array of Propriete objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Propriete
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
