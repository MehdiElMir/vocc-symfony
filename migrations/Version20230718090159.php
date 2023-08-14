<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230718090159 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE formation_module (formation_id INT NOT NULL, module_id INT NOT NULL, INDEX IDX_2C3D28055200282E (formation_id), INDEX IDX_2C3D2805AFC2B591 (module_id), PRIMARY KEY(formation_id, module_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE formation_module ADD CONSTRAINT FK_2C3D28055200282E FOREIGN KEY (formation_id) REFERENCES formation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE formation_module ADD CONSTRAINT FK_2C3D2805AFC2B591 FOREIGN KEY (module_id) REFERENCES module (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE formation_module DROP FOREIGN KEY FK_2C3D28055200282E');
        $this->addSql('ALTER TABLE formation_module DROP FOREIGN KEY FK_2C3D2805AFC2B591');
        $this->addSql('DROP TABLE formation_module');
    }
}
