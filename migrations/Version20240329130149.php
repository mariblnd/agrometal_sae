<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240329130149 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE media_social ADD contact INT DEFAULT NULL, ADD entreprise INT DEFAULT NULL');
        $this->addSql('ALTER TABLE media_social ADD CONSTRAINT FK_CD187B594C62E638 FOREIGN KEY (contact) REFERENCES contact_agrometal (id)');
        $this->addSql('ALTER TABLE media_social ADD CONSTRAINT FK_CD187B59D19FA60 FOREIGN KEY (entreprise) REFERENCES entreprise (id)');
        $this->addSql('CREATE INDEX IDX_CD187B594C62E638 ON media_social (contact)');
        $this->addSql('CREATE INDEX IDX_CD187B59D19FA60 ON media_social (entreprise)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE media_social DROP FOREIGN KEY FK_CD187B594C62E638');
        $this->addSql('ALTER TABLE media_social DROP FOREIGN KEY FK_CD187B59D19FA60');
        $this->addSql('DROP INDEX IDX_CD187B594C62E638 ON media_social');
        $this->addSql('DROP INDEX IDX_CD187B59D19FA60 ON media_social');
        $this->addSql('ALTER TABLE media_social DROP contact, DROP entreprise');
    }
}
