<?php
namespace ERP\ProductBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Product
 *
 * @ORM\Table(name="erp_product")
 * @ORM\Entity(repositoryClass="ERP\ProductBundle\Repository\ProductRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Product extends BaseProduct
{

}