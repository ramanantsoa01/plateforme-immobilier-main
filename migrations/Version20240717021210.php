<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240717021210 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE candidatures_locations (id INT AUTO_INCREMENT NOT NULL, nom_complet VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, statut VARCHAR(255) NOT NULL, date_location DATE NOT NULL, duree_location VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE candidatures_locations_proprietes (candidatures_locations_id INT NOT NULL, proprietes_id INT NOT NULL, INDEX IDX_2781D3332B570935 (candidatures_locations_id), INDEX IDX_2781D333A1005530 (proprietes_id), PRIMARY KEY(candidatures_locations_id, proprietes_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE candidatures_locations_proprietes ADD CONSTRAINT FK_2781D3332B570935 FOREIGN KEY (candidatures_locations_id) REFERENCES candidatures_locations (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE candidatures_locations_proprietes ADD CONSTRAINT FK_2781D333A1005530 FOREIGN KEY (proprietes_id) REFERENCES proprietes (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidatures_locations_proprietes DROP FOREIGN KEY FK_2781D3332B570935');
        $this->addSql('ALTER TABLE candidatures_locations_proprietes DROP FOREIGN KEY FK_2781D333A1005530');
        $this->addSql('DROP TABLE candidatures_locations');
        $this->addSql('DROP TABLE candidatures_locations_proprietes');
    }
}
