<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191007183956 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE position_internaute (position_id INT NOT NULL, internaute_id INT NOT NULL, INDEX IDX_426FBB4CDD842E46 (position_id), INDEX IDX_426FBB4CCAF41882 (internaute_id), PRIMARY KEY(position_id, internaute_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE position_bloc (position_id INT NOT NULL, bloc_id INT NOT NULL, INDEX IDX_D4E0BB04DD842E46 (position_id), INDEX IDX_D4E0BB045582E9C0 (bloc_id), PRIMARY KEY(position_id, bloc_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE position_internaute ADD CONSTRAINT FK_426FBB4CDD842E46 FOREIGN KEY (position_id) REFERENCES position (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE position_internaute ADD CONSTRAINT FK_426FBB4CCAF41882 FOREIGN KEY (internaute_id) REFERENCES internaute (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE position_bloc ADD CONSTRAINT FK_D4E0BB04DD842E46 FOREIGN KEY (position_id) REFERENCES position (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE position_bloc ADD CONSTRAINT FK_D4E0BB045582E9C0 FOREIGN KEY (bloc_id) REFERENCES bloc (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE promotion ADD categorie_de_services_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE promotion ADD CONSTRAINT FK_C11D7DD14A81A587 FOREIGN KEY (categorie_de_services_id) REFERENCES categorie_de_services (id)');
        $this->addSql('CREATE INDEX IDX_C11D7DD14A81A587 ON promotion (categorie_de_services_id)');
        $this->addSql('ALTER TABLE prestataire ADD promotion_id INT DEFAULT NULL, ADD utilisateur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE prestataire ADD CONSTRAINT FK_60A26480139DF194 FOREIGN KEY (promotion_id) REFERENCES promotion (id)');
        $this->addSql('ALTER TABLE prestataire ADD CONSTRAINT FK_60A26480FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_60A26480139DF194 ON prestataire (promotion_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_60A26480FB88E14F ON prestataire (utilisateur_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE position_internaute');
        $this->addSql('DROP TABLE position_bloc');
        $this->addSql('ALTER TABLE prestataire DROP FOREIGN KEY FK_60A26480139DF194');
        $this->addSql('ALTER TABLE prestataire DROP FOREIGN KEY FK_60A26480FB88E14F');
        $this->addSql('DROP INDEX IDX_60A26480139DF194 ON prestataire');
        $this->addSql('DROP INDEX UNIQ_60A26480FB88E14F ON prestataire');
        $this->addSql('ALTER TABLE prestataire DROP promotion_id, DROP utilisateur_id');
        $this->addSql('ALTER TABLE promotion DROP FOREIGN KEY FK_C11D7DD14A81A587');
        $this->addSql('DROP INDEX IDX_C11D7DD14A81A587 ON promotion');
        $this->addSql('ALTER TABLE promotion DROP categorie_de_services_id');
    }
}
