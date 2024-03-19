<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240318141335 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE media_social DROP FOREIGN KEY FK_CD187B59E7A1254A');
        $this->addSql('DROP INDEX IDX_CD187B59E7A1254A ON media_social');
        $this->addSql('ALTER TABLE media_social DROP contact_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE media_social ADD contact_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE media_social ADD CONSTRAINT FK_CD187B59E7A1254A FOREIGN KEY (contact_id) REFERENCES contact_agrometal (id)');
        $this->addSql('CREATE INDEX IDX_CD187B59E7A1254A ON media_social (contact_id)');
    }
}
