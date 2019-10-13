<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191008185605 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE stage CHANGE description description VARCHAR(100) DEFAULT NULL, CHANGE info_complementaire info_complementaire VARCHAR(100) DEFAULT NULL, CHANGE nom nom VARCHAR(100) DEFAULT NULL, CHANGE tarif tarif VARCHAR(100) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE stage CHANGE description description VARCHAR(10) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE info_complementaire info_complementaire VARCHAR(10) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE nom nom VARCHAR(10) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE tarif tarif VARCHAR(10) DEFAULT NULL COLLATE utf8mb4_unicode_ci');
    }
}
