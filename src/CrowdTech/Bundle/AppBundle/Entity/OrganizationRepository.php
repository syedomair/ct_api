<?php
namespace CrowdTech\Bundle\AppBundle\Entity;

use Doctrine\ORM\EntityRepository;

class OrganizationRepository extends EntityRepository 
{
    public function findOrganizationForClient($client, $page, $limit, $orderby, $sort){
        switch ($orderby)
        {
            case 'name':
                $orderby = 'org.name';
                break;
            default:
                $orderby = 'org.name';
        }

        $users = $this->createQueryBuilder('org')
            ->select('org')
            ->join('AppBundle:Client', 'client', 'WITH', 'org.client = client.id')
            ->where('client.id = :client')
            ->orderBy($orderby, $sort)
            ->setParameter('client', $client)
            ->setFirstResult( $page )
            ->setMaxResults( $limit )
            ->getQuery()
            ->getResult();

        return $users;
    }

    public function findOrganizationForClientCount($client){

        $query = $this->getEntityManager()
            ->createQuery(
                'SELECT COUNT(org.id) as organization_count FROM AppBundle:Organization org  
                    JOIN org.client client
                    WHERE client.id =:client ' )
            ->setParameter('client', $client);
    try {
            return $query->getSingleResult();
        } catch (\Doctrine\ORM\NoResultException $e) {
            return null;
        }    
    }

}
