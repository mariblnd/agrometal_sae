<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240329143057 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contact_agrometal ADD instagram_active TINYINT(1) NOT NULL, ADD instagram VARCHAR(255) NOT NULL, ADD linkedin_active TINYINT(1) NOT NULL, ADD linkedin VARCHAR(255) NOT NULL, ADD facebook_active TINYINT(1) NOT NULL, ADD facebook VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contact_agrometal DROP instagram_active, DROP instagram, DROP linkedin_active, DROP linkedin, DROP facebook_active, DROP facebook');
    }
}
