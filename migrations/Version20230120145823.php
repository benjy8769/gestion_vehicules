<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230120145823 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE voiture (id INT AUTO_INCREMENT NOT NULL, identifiant VARCHAR(255) NOT NULL, marque VARCHAR(255) DEFAULT NULL, modele VARCHAR(255) DEFAULT NULL, immatriculation VARCHAR(255) DEFAULT NULL, kilometrage VARCHAR(255) DEFAULT NULL, site VARCHAR(255) NOT NULL, observations LONGTEXT DEFAULT NULL, carburant VARCHAR(255) DEFAULT NULL, garantie VARCHAR(255) NOT NULL, est_disponible TINYINT(1) NOT NULL, mise_circulation DATE NOT NULL, geocoyote TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE utiliser');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE utiliser (id INT AUTO_INCREMENT NOT NULL, id_voiture_id INT NOT NULL, date_debut DATE NOT NULL, heure_debut TIME NOT NULL, date_fin DATE DEFAULT NULL, heure_fin TIME DEFAULT NULL, INDEX IDX_5C949109A40B286D (id_voiture_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE voiture');
    }
}
