<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191007184956 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE images_internaute (images_id INT NOT NULL, internaute_id INT NOT NULL, INDEX IDX_DD28BA43D44F05E5 (images_id), INDEX IDX_DD28BA43CAF41882 (internaute_id), PRIMARY KEY(images_id, internaute_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commentaire_internaute (commentaire_id INT NOT NULL, internaute_id INT NOT NULL, INDEX IDX_D4BCA54CBA9CD190 (commentaire_id), INDEX IDX_D4BCA54CCAF41882 (internaute_id), PRIMARY KEY(commentaire_id, internaute_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE images_internaute ADD CONSTRAINT FK_DD28BA43D44F05E5 FOREIGN KEY (images_id) REFERENCES images (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE images_internaute ADD CONSTRAINT FK_DD28BA43CAF41882 FOREIGN KEY (internaute_id) REFERENCES internaute (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE commentaire_internaute ADD CONSTRAINT FK_D4BCA54CBA9CD190 FOREIGN KEY (commentaire_id) REFERENCES commentaire (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE commentaire_internaute ADD CONSTRAINT FK_D4BCA54CCAF41882 FOREIGN KEY (internaute_id) REFERENCES internaute (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE prestataire ADD favori_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE prestataire ADD CONSTRAINT FK_60A26480FF17033F FOREIGN KEY (favori_id) REFERENCES favori (id)');
        $this->addSql('CREATE INDEX IDX_60A26480FF17033F ON prestataire (favori_id)');
        $this->addSql('ALTER TABLE internaute ADD favori_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE internaute ADD CONSTRAINT FK_6C8E97CCFF17033F FOREIGN KEY (favori_id) REFERENCES favori (id)');
        $this->addSql('CREATE INDEX IDX_6C8E97CCFF17033F ON internaute (favori_id)');
        $this->addSql('ALTER TABLE images ADD categorie_de_services_id INT DEFAULT NULL, ADD prestataire_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE images ADD CONSTRAINT FK_E01FBE6A4A81A587 FOREIGN KEY (categorie_de_services_id) REFERENCES categorie_de_services (id)');
        $this->addSql('ALTER TABLE images ADD CONSTRAINT FK_E01FBE6ABE3DB2B7 FOREIGN KEY (prestataire_id) REFERENCES prestataire (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E01FBE6A4A81A587 ON images (categorie_de_services_id)');
        $this->addSql('CREATE INDEX IDX_E01FBE6ABE3DB2B7 ON images (prestataire_id)');
        $this->addSql('ALTER TABLE commentaire ADD prestataire_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCBE3DB2B7 FOREIGN KEY (prestataire_id) REFERENCES prestataire (id)');
        $this->addSql('CREATE INDEX IDX_67F068BCBE3DB2B7 ON commentaire (prestataire_id)');
        $this->addSql('ALTER TABLE abus ADD internaute_id INT DEFAULT NULL, ADD commentaire_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE abus ADD CONSTRAINT FK_72C9FD01CAF41882 FOREIGN KEY (internaute_id) REFERENCES internaute (id)');
        $this->addSql('ALTER TABLE abus ADD CONSTRAINT FK_72C9FD01BA9CD190 FOREIGN KEY (commentaire_id) REFERENCES commentaire (id)');
        $this->addSql('CREATE INDEX IDX_72C9FD01CAF41882 ON abus (internaute_id)');
        $this->addSql('CREATE INDEX IDX_72C9FD01BA9CD190 ON abus (commentaire_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE images_internaute');
        $this->addSql('DROP TABLE commentaire_internaute');
        $this->addSql('ALTER TABLE abus DROP FOREIGN KEY FK_72C9FD01CAF41882');
        $this->addSql('ALTER TABLE abus DROP FOREIGN KEY FK_72C9FD01BA9CD190');
        $this->addSql('DROP INDEX IDX_72C9FD01CAF41882 ON abus');
        $this->addSql('DROP INDEX IDX_72C9FD01BA9CD190 ON abus');
        $this->addSql('ALTER TABLE abus DROP internaute_id, DROP commentaire_id');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BCBE3DB2B7');
        $this->addSql('DROP INDEX IDX_67F068BCBE3DB2B7 ON commentaire');
        $this->addSql('ALTER TABLE commentaire DROP prestataire_id');
        $this->addSql('ALTER TABLE images DROP FOREIGN KEY FK_E01FBE6A4A81A587');
        $this->addSql('ALTER TABLE images DROP FOREIGN KEY FK_E01FBE6ABE3DB2B7');
        $this->addSql('DROP INDEX UNIQ_E01FBE6A4A81A587 ON images');
        $this->addSql('DROP INDEX IDX_E01FBE6ABE3DB2B7 ON images');
        $this->addSql('ALTER TABLE images DROP categorie_de_services_id, DROP prestataire_id');
        $this->addSql('ALTER TABLE internaute DROP FOREIGN KEY FK_6C8E97CCFF17033F');
        $this->addSql('DROP INDEX IDX_6C8E97CCFF17033F ON internaute');
        $this->addSql('ALTER TABLE internaute DROP favori_id');
        $this->addSql('ALTER TABLE prestataire DROP FOREIGN KEY FK_60A26480FF17033F');
        $this->addSql('DROP INDEX IDX_60A26480FF17033F ON prestataire');
        $this->addSql('ALTER TABLE prestataire DROP favori_id');
    }
}
