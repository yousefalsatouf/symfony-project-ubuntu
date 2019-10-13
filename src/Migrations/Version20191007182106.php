<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191007182106 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B3B2B59251');
        $this->addSql('DROP INDEX IDX_1D1C63B3B2B59251 ON utilisateur');
        $this->addSql('ALTER TABLE utilisateur CHANGE code_postal_id code_postal_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B3F3432E9E FOREIGN KEY (code_postal_id_id) REFERENCES code_postal (id)');
        $this->addSql('CREATE INDEX IDX_1D1C63B3F3432E9E ON utilisateur (code_postal_id_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B3F3432E9E');
        $this->addSql('DROP INDEX IDX_1D1C63B3F3432E9E ON utilisateur');
        $this->addSql('ALTER TABLE utilisateur CHANGE code_postal_id_id code_postal_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B3B2B59251 FOREIGN KEY (code_postal_id) REFERENCES code_postal (id)');
        $this->addSql('CREATE INDEX IDX_1D1C63B3B2B59251 ON utilisateur (code_postal_id)');
    }
}
