<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230301085058 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE assurance');
        $this->addSql('DROP TABLE entretien');
        $this->addSql('ALTER TABLE voiture ADD vehicule VARCHAR(255) DEFAULT NULL, ADD ancienne_vidange VARCHAR(255) DEFAULT NULL, ADD prochaine_vidange VARCHAR(255) DEFAULT NULL, ADD ancienne_distribution VARCHAR(255) DEFAULT NULL, ADD prochaine_distribution VARCHAR(255) DEFAULT NULL, ADD ancienne_revision VARCHAR(255) DEFAULT NULL, ADD prochaine_revision VARCHAR(255) DEFAULT NULL, ADD ancien_ct VARCHAR(255) DEFAULT NULL, ADD prochain_ct VARCHAR(255) DEFAULT NULL, ADD nom_assurance VARCHAR(255) DEFAULT NULL, ADD date_echeance_assurance VARCHAR(255) DEFAULT NULL, ADD proprietaire VARCHAR(255) DEFAULT NULL, ADD type_financement VARCHAR(255) DEFAULT NULL, ADD fin_financement VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE assurance (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE entretien (id INT AUTO_INCREMENT NOT NULL, identifiant VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, marque VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, modele VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, immatriculation VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, kilometrage VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, site VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, observations MEDIUMTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, carburant VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, garantie VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, est_disponible TINYINT(1) NOT NULL, geocoyote TINYINT(1) NOT NULL, num_geocoyote INT DEFAULT NULL, ancienne_vidange INT DEFAULT NULL, prochaine_vidange INT DEFAULT NULL, ancienne_distribution INT DEFAULT NULL, prochaine_distribution INT DEFAULT NULL, ancienne_revision INT DEFAULT NULL, prochaine_revision INT DEFAULT NULL, ancien_controle DATE DEFAULT NULL, prochain_controle DATE DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE voiture DROP vehicule, DROP ancienne_vidange, DROP prochaine_vidange, DROP ancienne_distribution, DROP prochaine_distribution, DROP ancienne_revision, DROP prochaine_revision, DROP ancien_ct, DROP prochain_ct, DROP nom_assurance, DROP date_echeance_assurance, DROP proprietaire, DROP type_financement, DROP fin_financement');
    }
}
