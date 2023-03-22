<?php

namespace App\Repository;

use App\DTO\Parser\ProductDTO;
use App\Entity\Product;
use DateTime;
use DateTimeImmutable;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Product>
 *
 * @method Product|null find($id, $lockMode = null, $lockVersion = null)
 * @method Product|null findOneBy(array $criteria, array $orderBy = null)
 * @method Product[]    findAll()
 * @method Product[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Product::class);
    }

    public function save(Product $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Product $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function updateOrCreate(ProductDTO $productDTO): void {
        $product = $this->findOneBy(['externalId' => $productDTO->getExternalId()]);
        $datetime = new DateTime; // Create DateTime for current time
        $datetime = DateTimeImmutable::createFromMutable($datetime);
        
        if(is_null($product)) {
            $product = new Product();
            $product->setCreatedAt($datetime);
        }

        $product->setName($productDTO->getName());
        $product->setBrandName($productDTO->getBrandName());
        $product->setExternalId($productDTO->getExternalId());
        $product->setFullPrice($productDTO->getFullPrice());
        $product->setSalePrice($productDTO->getSalePrice());
        $product->setCategory($productDTO->getCategory());
        $product->setExtra($productDTO->getExtra());
        $product->setDiffPrice($productDTO->getDiffPrice());
        $product->setShopVendor($productDTO->getShopVendor());
        $product->setLink($productDTO->getLink());
        $product->setUpdatedAt($datetime);

        $this->save($product, true);
    }

/*
    }

//    /**
//     * @return Product[] Returns an array of Product objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Product
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
