<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200918125623 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE invoice ADD selling_price DOUBLE PRECISION DEFAULT \'0\' NOT NULL, CHANGE invoice_id invoice_id VARCHAR(15) NOT NULL, CHANGE invoice_amount invoice_amount DOUBLE PRECISION NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE invoice DROP selling_price, CHANGE invoice_id invoice_id VARCHAR(15) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, CHANGE invoice_amount invoice_amount DOUBLE PRECISION DEFAULT NULL');
    }
}
