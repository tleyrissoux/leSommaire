<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230522130249 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE propriete ADD image VARCHAR(255) DEFAULT NULL, ADD nombre_etoiles INT NOT NULL, ADD depositaire VARCHAR(255) NOT NULL, ADD premiere_page LONGTEXT NOT NULL, ADD livre VARCHAR(255) NOT NULL, ADD nombre_pages INT NOT NULL, ADD auteur VARCHAR(255) DEFAULT NULL, ADD isbn VARCHAR(255) DEFAULT NULL, ADD depose_a DATETIME NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE propriete DROP image, DROP nombre_etoiles, DROP depositaire, DROP premiere_page, DROP livre, DROP nombre_pages, DROP auteur, DROP isbn, DROP depose_a');
    }
}
