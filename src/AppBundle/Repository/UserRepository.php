<?php
declare(strict_types=1);

/**
 * User Repository
 */

namespace AppBundle\Repository;

use AppBundle\Entity\User;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * UserRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UserRepository extends EntityRepository
{
    /**
     * Get paginate users
     * @access public
     * @param int $page
     * 
     * @return Paginator
     */
    public function getUsers($page): Paginator
    {
        $query = $this->createQueryBuilder('u')
            ->getQuery()
        ;

        $query
            ->setFirstResult(($page - 1) * User::USER_PER_PAGE)
            ->setMaxResults(User::USER_PER_PAGE)
        ;

        return new Paginator($query, true);
    }
}