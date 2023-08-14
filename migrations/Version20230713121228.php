<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230713121228 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE inscription (id INT AUTO_INCREMENT NOT NULL, nom_et_prenom VARCHAR(255) NOT NULL, fonction VARCHAR(255) NOT NULL, telephone INT NOT NULL, email VARCHAR(255) NOT NULL, reseaux_sociaux VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, code_postal INT NOT NULL, ville VARCHAR(255) NOT NULL, pays VARCHAR(255) NOT NULL, formation VARCHAR(255) NOT NULL, jour INT NOT NULL, mois VARCHAR(255) NOT NULL, annee INT NOT NULL, prenom_et_nom1 VARCHAR(255) NOT NULL, prenom_et_nom2 VARCHAR(255) DEFAULT NULL, prenom_et_nom3 VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE inscription');
    }
}
