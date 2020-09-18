<?php

namespace AppBundle\Entity;

use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Csv
 * @package AppBundle\Entity
 */
class Csv
{
    /**
     * @var FileType
     * @Assert\NotBlank(message="Please, upload the CSV.")
     * @Assert\File( maxSize = "1024k", mimeTypes = {"text/csv"}, mimeTypesMessage = "Please upload a valid CSV File")
     */
    private $csv;

    /**
     * @return string
     */
    public function getCsv(): string
    {
        return $this->csv;
    }

    /**
     * @param string $csv
     */
    public function setCsv(string $csv): void
    {
        $this->csv = $csv;
    }
}