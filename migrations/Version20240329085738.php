<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240329085738 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE entreprise ADD region VARCHAR(255) NOT NULL, ADD margin_top INT NOT NULL, ADD margin_left INT NOT NULL');
        $this->addSql('ALTER TABLE point_carte DROP FOREIGN KEY FK_19E17F6EA4AEAFEA');
        $this->addSql('DROP INDEX IDX_19E17F6EA4AEAFEA ON point_carte');
        $this->addSql('ALTER TABLE point_carte DROP entreprise_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE entreprise DROP region, DROP margin_top, DROP margin_left');
        $this->addSql('ALTER TABLE point_carte ADD entreprise_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE point_carte ADD CONSTRAINT FK_19E17F6EA4AEAFEA FOREIGN KEY (entreprise_id) REFERENCES entreprise (id)');
        $this->addSql('CREATE INDEX IDX_19E17F6EA4AEAFEA ON point_carte (entreprise_id)');
    }
}
