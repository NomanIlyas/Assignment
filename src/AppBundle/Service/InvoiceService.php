<?php

namespace AppBundle\Service;

use AppBundle\Enum\InvoiceEnum;
use AppBundle\Repository\InvoiceRepository;
use Symfony\Component\HttpFoundation\File\File;

/**
 * Class InvoiceService
 * @package AppBundle\Service
 */
class InvoiceService
{
    /**
     * @var InvoiceRepository InvoiceRepository
     */
    private InvoiceRepository $invoiceRepository;

    /**
     * InvoiceService constructor.
     * @param InvoiceRepository $invoiceRepository
     */
    public function __construct(InvoiceRepository $invoiceRepository)
    {
        $this->invoiceRepository = $invoiceRepository;
    }

    /**
     * @param File $file
     * @throws \Exception
     */
    public function saveCsvInvoice($file)
    {
        $csv = array_map('str_getcsv', file($file));
        foreach ($csv as $item) {
            if (!$this->isInvoiceExist($item[0])) {
                $item[3] = $this->getSellingPrice($item[1], $item[2]);
                $this->invoiceRepository->saveInvoiceItems($item);
            }
        }
    }

    /**
     * @param $amount
     * @param $date
     * @return float
     * @throws \Exception
     */
    private function getSellingPrice($amount, $date): float
    {
        $coEfficient = $this->fetchCoEfficient($date);
        return $coEfficient * $amount;
    }

    /**
     * @param $date
     * @return float
     * @throws \Exception
     */
    private function fetchCoEfficient($date): float
    {
        $OldDate = new \DateTime($date);
        $now = new \DateTime(Date('Y-m-d'));
        $days =  ($OldDate->diff($now))->days;
        if ($days <= InvoiceEnum::VALID_DAYS) {
            return InvoiceEnum::CO_EFFICIENT_LOW;
        }
        return InvoiceEnum::CO_EFFICIENT_HIGH;
    }

    public function fetchInvoices()
    {
        return $this->invoiceRepository->findAll();
    }

    private function isInvoiceExist($id) {
        $invoice = $this->invoiceRepository
            ->findOneBy([
                'invoice_id' => $id
            ]);
        return empty($invoice) ? false: true;
    }
}
