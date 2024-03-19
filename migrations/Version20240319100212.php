<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240319100212 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE work_contact (id INT AUTO_INCREMENT NOT NULL, contact_id INT DEFAULT NULL, mail VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, INDEX IDX_99A95E1AE7A1254A (contact_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE work_contact ADD CONSTRAINT FK_99A95E1AE7A1254A FOREIGN KEY (contact_id) REFERENCES contact_agrometal (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE work_contact DROP FOREIGN KEY FK_99A95E1AE7A1254A');
        $this->addSql('DROP TABLE work_contact');
    }
}
