<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230125102124 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE utilisation_voiture DROP FOREIGN KEY FK_E38B441E181A8BA');
        $this->addSql('ALTER TABLE utilisation_voiture DROP FOREIGN KEY FK_E38B441EBCD54630');
        $this->addSql('DROP TABLE utilisation_voiture');
        $this->addSql('ALTER TABLE utilisation ADD id_vehicule VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE utilisation_voiture (utilisation_id INT NOT NULL, voiture_id INT NOT NULL, INDEX IDX_E38B441EBCD54630 (utilisation_id), INDEX IDX_E38B441E181A8BA (voiture_id), PRIMARY KEY(utilisation_id, voiture_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE utilisation_voiture ADD CONSTRAINT FK_E38B441E181A8BA FOREIGN KEY (voiture_id) REFERENCES voiture (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE utilisation_voiture ADD CONSTRAINT FK_E38B441EBCD54630 FOREIGN KEY (utilisation_id) REFERENCES utilisation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE utilisation DROP id_vehicule');
    }
}
