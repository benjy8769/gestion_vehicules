<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230125093055 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE assurance (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entretien (id INT AUTO_INCREMENT NOT NULL, identifiant VARCHAR(255) NOT NULL, marque VARCHAR(255) DEFAULT NULL, modele VARCHAR(255) DEFAULT NULL, immatriculation VARCHAR(255) DEFAULT NULL, kilometrage VARCHAR(255) DEFAULT NULL, site VARCHAR(255) NOT NULL, observations LONGTEXT DEFAULT NULL, carburant VARCHAR(255) DEFAULT NULL, garantie VARCHAR(255) NOT NULL, est_disponible TINYINT(1) NOT NULL, geocoyote TINYINT(1) NOT NULL, ancienne_vidange INT DEFAULT NULL, prochaine_vidange INT DEFAULT NULL, ancienne_distribution INT DEFAULT NULL, prochaine_distribution INT DEFAULT NULL, ancienne_revision INT DEFAULT NULL, prochaine_revision INT DEFAULT NULL, ancien_controle DATE DEFAULT NULL, prochain_controle DATE DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateurs (id INT AUTO_INCREMENT NOT NULL, identifiant VARCHAR(180) NOT NULL, role VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, mot_de_passe VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_497B315EC90409EC (identifiant), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisation (id INT AUTO_INCREMENT NOT NULL, date_debut VARCHAR(255) NOT NULL, date_fin VARCHAR(255) DEFAULT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisation_voiture (utilisation_id INT NOT NULL, voiture_id INT NOT NULL, INDEX IDX_E38B441EBCD54630 (utilisation_id), INDEX IDX_E38B441E181A8BA (voiture_id), PRIMARY KEY(utilisation_id, voiture_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE utilisation_voiture ADD CONSTRAINT FK_E38B441EBCD54630 FOREIGN KEY (utilisation_id) REFERENCES utilisation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE utilisation_voiture ADD CONSTRAINT FK_E38B441E181A8BA FOREIGN KEY (voiture_id) REFERENCES voiture (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE voiture DROP mise_circulation');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE utilisation_voiture DROP FOREIGN KEY FK_E38B441EBCD54630');
        $this->addSql('ALTER TABLE utilisation_voiture DROP FOREIGN KEY FK_E38B441E181A8BA');
        $this->addSql('DROP TABLE assurance');
        $this->addSql('DROP TABLE entretien');
        $this->addSql('DROP TABLE utilisateurs');
        $this->addSql('DROP TABLE utilisation');
        $this->addSql('DROP TABLE utilisation_voiture');
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('ALTER TABLE voiture ADD mise_circulation DATE NOT NULL');
    }
}
