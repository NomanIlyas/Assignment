<?php

namespace AppBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Invoice
 * @package AppBundle\Entity
 *
 * @ORM\Entity(repositoryClass="AppBundle\Repository\InvoiceRepository")
 * @ORM\Table(
 *     uniqueConstraints={@ORM\UniqueConstraint(name="invoice_unique", columns={"invoice_id"})})
 */
class Invoice extends AbstractEntity
{
    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=false, length=15)
     * @Gedmo\Versioned
     */
    private string $invoice_id;

    /**
     * @var float
     *
     * @ORM\Column(type="float", nullable=false)
     * @Gedmo\Versioned
     */
    private float $invoice_amount;

    /**
     * @var float
     *
     * @ORM\Column(type="float", nullable=false, options={ "default"=0 })
     * @Gedmo\Versioned
     */
    private float $selling_price;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", nullable=true)
     * @Gedmo\Versioned
     */
    private \DateTime $due_date;

    /**
     * @return string
     */
    public function getInvoiceId(): string
    {
        return $this->invoice_id;
    }

    /**
     * @param string $invoice_id
     * @return Invoice
     */
    public function setInvoiceId(string $invoice_id): Invoice
    {
        $this->invoice_id = $invoice_id;
        return $this;
    }

    /**
     * @return float
     */
    public function getInvoiceAmount(): float
    {
        return $this->invoice_amount;
    }

    /**
     * @param float $invoice_amount
     * @return Invoice
     */
    public function setInvoiceAmount(float $invoice_amount): Invoice
    {
        $this->invoice_amount = $invoice_amount;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDueDate(): \DateTime
    {
        return $this->due_date;
    }

    /**
     * @param \DateTime $due_date
     * @return Invoice
     */
    public function setDueDate(\DateTime $due_date): Invoice
    {
        $this->due_date = $due_date;
        return $this;
    }

    /**
     * @return float
     */
    public function getSellingPrice(): float
    {
        return $this->selling_price;
    }

    /**
     * @param float $selling_price
     * @return Invoice
     */
    public function setSellingPrice(float $selling_price): Invoice
    {
        $this->selling_price = $selling_price;
        return $this;
    }

}
