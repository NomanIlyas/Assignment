<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Invoice;
use Doctrine\ORM\EntityRepository;

/**
 * Class InvoiceRepository
 * @package AppBundle\Repository
 */
class InvoiceRepository extends EntityRepository
{
    /**
     * @param array $item
     * @throws \Exception
     */
    public function saveInvoiceItems($item)
    {
        $invoice = new Invoice();
        $invoice->setInvoiceId($item[0]);
        $invoice->setInvoiceAmount($item[1]);
        $invoice->setDueDate(new \DateTime($item[2]));
        $invoice->setSellingPrice($item[3]);
        $invoice->setCreatedAt(new \DateTime('now'));
        $invoice->setUpdatedAt(new \DateTime('now'));
        try {
            $em = $this->getEntityManager();
            $em->persist($invoice);
            $em->flush($invoice);
        } catch (\Exception $exception) {
            echo $exception->getMessage();
        }
    }
}
