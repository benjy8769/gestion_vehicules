<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230111202958 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE assurance (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entretien (id INT AUTO_INCREMENT NOT NULL, identifiant VARCHAR(255) NOT NULL, marque VARCHAR(255) DEFAULT NULL, modele VARCHAR(255) DEFAULT NULL, immatriculation VARCHAR(255) DEFAULT NULL, kilometrage VARCHAR(255) DEFAULT NULL, site VARCHAR(255) NOT NULL, observations LONGTEXT DEFAULT NULL, carburant VARCHAR(255) DEFAULT NULL, garantie VARCHAR(255) NOT NULL, est_disponible TINYINT(1) NOT NULL, numero_serie VARCHAR(255) DEFAULT NULL, geocoyote TINYINT(1) NOT NULL, ancienne_vidange INT DEFAULT NULL, prochaine_vidange INT DEFAULT NULL, ancienne_distribution INT DEFAULT NULL, prochaine_distribution INT DEFAULT NULL, ancienne_revision INT DEFAULT NULL, prochaine_revision INT DEFAULT NULL, ancien_controle DATE DEFAULT NULL, prochain_controle DATE DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE est_assure (id INT AUTO_INCREMENT NOT NULL, assurance_id INT NOT NULL, numero_assurance VARCHAR(255) NOT NULL, montant_mois DOUBLE PRECISION DEFAULT NULL, montant_annee DOUBLE PRECISION DEFAULT NULL, INDEX IDX_965633ECB288C3E3 (assurance_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateurs (id INT AUTO_INCREMENT NOT NULL, id_utilisateur_id INT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, identifiant VARCHAR(255) NOT NULL, mail VARCHAR(255) DEFAULT NULL, mot_de_passe VARCHAR(255) NOT NULL, role VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_497B315EC6EE5C49 (id_utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utiliser_vehicules (id INT AUTO_INCREMENT NOT NULL, voiture_id INT NOT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, heure_debut TIME NOT NULL, heure_fin TIME NOT NULL, INDEX IDX_5BF9694F181A8BA (voiture_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE voiture (id INT AUTO_INCREMENT NOT NULL, identifiant_voiture_id INT NOT NULL, identifiant VARCHAR(255) NOT NULL, marque VARCHAR(255) DEFAULT NULL, modele VARCHAR(255) DEFAULT NULL, immatriculation VARCHAR(255) DEFAULT NULL, kilometrage VARCHAR(255) DEFAULT NULL, site VARCHAR(255) NOT NULL, observations LONGTEXT DEFAULT NULL, carburant VARCHAR(255) DEFAULT NULL, garantie VARCHAR(255) NOT NULL, est_disponible TINYINT(1) NOT NULL, numero_serie VARCHAR(255) DEFAULT NULL, geocoyote TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_E9E2810F8BF54F78 (identifiant_voiture_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE est_assure ADD CONSTRAINT FK_965633ECB288C3E3 FOREIGN KEY (assurance_id) REFERENCES assurance (id)');
        $this->addSql('ALTER TABLE utilisateurs ADD CONSTRAINT FK_497B315EC6EE5C49 FOREIGN KEY (id_utilisateur_id) REFERENCES utiliser_vehicules (id)');
        $this->addSql('ALTER TABLE utiliser_vehicules ADD CONSTRAINT FK_5BF9694F181A8BA FOREIGN KEY (voiture_id) REFERENCES voiture (id)');
        $this->addSql('ALTER TABLE voiture ADD CONSTRAINT FK_E9E2810F8BF54F78 FOREIGN KEY (identifiant_voiture_id) REFERENCES est_assure (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE est_assure DROP FOREIGN KEY FK_965633ECB288C3E3');
        $this->addSql('ALTER TABLE utilisateurs DROP FOREIGN KEY FK_497B315EC6EE5C49');
        $this->addSql('ALTER TABLE utiliser_vehicules DROP FOREIGN KEY FK_5BF9694F181A8BA');
        $this->addSql('ALTER TABLE voiture DROP FOREIGN KEY FK_E9E2810F8BF54F78');
        $this->addSql('DROP TABLE assurance');
        $this->addSql('DROP TABLE entretien');
        $this->addSql('DROP TABLE est_assure');
        $this->addSql('DROP TABLE utilisateurs');
        $this->addSql('DROP TABLE utiliser_vehicules');
        $this->addSql('DROP TABLE voiture');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
