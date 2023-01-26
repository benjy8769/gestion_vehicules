<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230126103847 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE entretien CHANGE marque marque VARCHAR(255) NOT NULL, CHANGE modele modele VARCHAR(255) NOT NULL, CHANGE immatriculation immatriculation VARCHAR(255) NOT NULL, CHANGE kilometrage kilometrage VARCHAR(255) NOT NULL, CHANGE observations observations LONGTEXT NOT NULL, CHANGE carburant carburant VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE voiture CHANGE marque marque VARCHAR(255) NOT NULL, CHANGE modele modele VARCHAR(255) NOT NULL, CHANGE immatriculation immatriculation VARCHAR(255) NOT NULL, CHANGE kilometrage kilometrage VARCHAR(255) NOT NULL, CHANGE observations observations LONGTEXT NOT NULL, CHANGE carburant carburant VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE entretien CHANGE marque marque VARCHAR(255) DEFAULT NULL, CHANGE modele modele VARCHAR(255) DEFAULT NULL, CHANGE immatriculation immatriculation VARCHAR(255) DEFAULT NULL, CHANGE kilometrage kilometrage VARCHAR(255) DEFAULT NULL, CHANGE observations observations LONGTEXT DEFAULT NULL, CHANGE carburant carburant VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE voiture CHANGE marque marque VARCHAR(255) DEFAULT NULL, CHANGE modele modele VARCHAR(255) DEFAULT NULL, CHANGE immatriculation immatriculation VARCHAR(255) DEFAULT NULL, CHANGE kilometrage kilometrage VARCHAR(255) DEFAULT NULL, CHANGE observations observations LONGTEXT DEFAULT NULL, CHANGE carburant carburant VARCHAR(255) DEFAULT NULL');
    }
}
