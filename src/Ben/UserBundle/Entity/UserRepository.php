<?php

namespace Ben\UserBundle\Entity;
 
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;
 
class UserRepository extends EntityRepository
{
    public function getActive()
    {
        // Comme vous le voyez, le délais est redondant ici, l'idéale serait de le rendre configurable via votre bundle
        $delay = new \DateTime();
        $delay->setTimestamp(strtotime('2 minutes ago'));
 
        $qb = $this->createQueryBuilder('u')
            ->where('u.lastActivity > :delay')
            ->setParameter('delay', $delay)
        ;
 
        return $qb->getQuery()->getResult();
    }

    public function getUsers()
    {
        $qb = $this->createQueryBuilder('u')
                ->leftJoin('u.profile', 'profile')
                ->addSelect('profile')
        ;
 
        return $qb->getQuery()->getResult();
    }

    public function getUsersBy($nombreParPage, $page, $keyword) {       
       $qb = $this->createQueryBuilder('u')
                ->leftJoin('u.image', 'img')
                ->addSelect('img')
                ->andWhere('u.username like :keyword or u.email like :keyword or u.family_name like :keyword or u.first_name like :keyword or u.roles like :keyword')
                ->setParameter('keyword', '%'.$keyword.'%');
        $qb->setFirstResult(($page - 1) * $nombreParPage)
        ->setMaxResults($nombreParPage);

       return new Paginator($qb->getQuery());
    }

    public function counter() {
        $sql = 'SELECT count(u) FROM ben\UserBundle\Entity\User u';
        $query = $this->_em->createQuery($sql);
         
      return $query->getOneOrNullResult();
    }
}