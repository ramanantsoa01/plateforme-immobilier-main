<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240721192710 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE candidatures_ventes_proprietes DROP FOREIGN KEY FK_33D104FD55DD0858');
        $this->addSql('ALTER TABLE candidatures_ventes_proprietes DROP FOREIGN KEY FK_33D104FDA1005530');
        $this->addSql('DROP TABLE candidatures_ventes');
        $this->addSql('DROP TABLE candidatures_ventes_proprietes');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE candidatures_ventes (id INT AUTO_INCREMENT NOT NULL, nom_complet VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, email VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, telephone VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE candidatures_ventes_proprietes (candidatures_ventes_id INT NOT NULL, proprietes_id INT NOT NULL, INDEX IDX_33D104FDA1005530 (proprietes_id), INDEX IDX_33D104FD55DD0858 (candidatures_ventes_id), PRIMARY KEY(candidatures_ventes_id, proprietes_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE candidatures_ventes_proprietes ADD CONSTRAINT FK_33D104FD55DD0858 FOREIGN KEY (candidatures_ventes_id) REFERENCES candidatures_ventes (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE candidatures_ventes_proprietes ADD CONSTRAINT FK_33D104FDA1005530 FOREIGN KEY (proprietes_id) REFERENCES proprietes (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('DROP TABLE user');
    }
}
