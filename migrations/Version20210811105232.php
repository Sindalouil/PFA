<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210811105232 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE materieluser (id INT AUTO_INCREMENT NOT NULL, iduser_id INT DEFAULT NULL, idmateriel_id INT DEFAULT NULL, statut VARCHAR(255) DEFAULT NULL, INDEX IDX_ED539153786A81FB (iduser_id), INDEX IDX_ED539153D0497A00 (idmateriel_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE materieluser ADD CONSTRAINT FK_ED539153786A81FB FOREIGN KEY (iduser_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE materieluser ADD CONSTRAINT FK_ED539153D0497A00 FOREIGN KEY (idmateriel_id) REFERENCES materiel (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE materieluser');
    }
}
