<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230126093740 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE utilisation ADD voiture_id VARCHAR(50) NOT NULL');
        $this->addSql('DROP INDEX identifiant ON voiture');
        $this->addSql('ALTER TABLE voiture CHANGE identifiant identifiant VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE utilisation DROP voiture_id');
        $this->addSql('ALTER TABLE voiture CHANGE identifiant identifiant VARCHAR(50) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX identifiant ON voiture (identifiant)');
    }
}
