<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200823182923 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE parking ADD cars VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE parking_space CHANGE height height DOUBLE PRECISION NOT NULL, CHANGE width width DOUBLE PRECISION NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE parking DROP cars');
        $this->addSql('ALTER TABLE parking_space CHANGE height height DOUBLE PRECISION DEFAULT \'250\' NOT NULL, CHANGE width width DOUBLE PRECISION DEFAULT \'250\' NOT NULL');
    }
}
