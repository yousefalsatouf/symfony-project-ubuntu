<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191007182630 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE utilisateur ADD commune_id_id INT DEFAULT NULL, ADD internaute_id_id INT DEFAULT NULL, ADD localite_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B3BBB7D3AD FOREIGN KEY (commune_id_id) REFERENCES commune (id)');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B3BC3BA448 FOREIGN KEY (internaute_id_id) REFERENCES internaute (id)');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B31EB763E9 FOREIGN KEY (localite_id_id) REFERENCES localite (id)');
        $this->addSql('CREATE INDEX IDX_1D1C63B3BBB7D3AD ON utilisateur (commune_id_id)');
        $this->addSql('CREATE INDEX IDX_1D1C63B3BC3BA448 ON utilisateur (internaute_id_id)');
        $this->addSql('CREATE INDEX IDX_1D1C63B31EB763E9 ON utilisateur (localite_id_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B3BBB7D3AD');
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B3BC3BA448');
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B31EB763E9');
        $this->addSql('DROP INDEX IDX_1D1C63B3BBB7D3AD ON utilisateur');
        $this->addSql('DROP INDEX IDX_1D1C63B3BC3BA448 ON utilisateur');
        $this->addSql('DROP INDEX IDX_1D1C63B31EB763E9 ON utilisateur');
        $this->addSql('ALTER TABLE utilisateur DROP commune_id_id, DROP internaute_id_id, DROP localite_id_id');
    }
}
