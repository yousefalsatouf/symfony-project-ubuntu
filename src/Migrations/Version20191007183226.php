<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191007183226 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE proposer_categorie_de_services (proposer_id INT NOT NULL, categorie_de_services_id INT NOT NULL, INDEX IDX_26A7FBB1B13FA634 (proposer_id), INDEX IDX_26A7FBB14A81A587 (categorie_de_services_id), PRIMARY KEY(proposer_id, categorie_de_services_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE proposer_prestataire (proposer_id INT NOT NULL, prestataire_id INT NOT NULL, INDEX IDX_8EFBA7CBB13FA634 (proposer_id), INDEX IDX_8EFBA7CBBE3DB2B7 (prestataire_id), PRIMARY KEY(proposer_id, prestataire_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE proposer_categorie_de_services ADD CONSTRAINT FK_26A7FBB1B13FA634 FOREIGN KEY (proposer_id) REFERENCES proposer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE proposer_categorie_de_services ADD CONSTRAINT FK_26A7FBB14A81A587 FOREIGN KEY (categorie_de_services_id) REFERENCES categorie_de_services (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE proposer_prestataire ADD CONSTRAINT FK_8EFBA7CBB13FA634 FOREIGN KEY (proposer_id) REFERENCES proposer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE proposer_prestataire ADD CONSTRAINT FK_8EFBA7CBBE3DB2B7 FOREIGN KEY (prestataire_id) REFERENCES prestataire (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE stage ADD prestataire_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE stage ADD CONSTRAINT FK_C27C9369BE3DB2B7 FOREIGN KEY (prestataire_id) REFERENCES prestataire (id)');
        $this->addSql('CREATE INDEX IDX_C27C9369BE3DB2B7 ON stage (prestataire_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE proposer_categorie_de_services');
        $this->addSql('DROP TABLE proposer_prestataire');
        $this->addSql('ALTER TABLE stage DROP FOREIGN KEY FK_C27C9369BE3DB2B7');
        $this->addSql('DROP INDEX IDX_C27C9369BE3DB2B7 ON stage');
        $this->addSql('ALTER TABLE stage DROP prestataire_id');
    }
}
