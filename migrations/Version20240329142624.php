<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240329142624 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contact_agrometal DROP FOREIGN KEY FK_9DDB74C978180273');
        $this->addSql('ALTER TABLE entreprise DROP FOREIGN KEY FK_D19FA6078180273');
        $this->addSql('ALTER TABLE media_social DROP FOREIGN KEY FK_CD187B594C62E638');
        $this->addSql('ALTER TABLE media_social DROP FOREIGN KEY FK_CD187B59D19FA60');
        $this->addSql('DROP TABLE media_social');
        $this->addSql('DROP INDEX IDX_9DDB74C978180273 ON contact_agrometal');
        $this->addSql('ALTER TABLE contact_agrometal DROP socialmedia');
        $this->addSql('DROP INDEX IDX_D19FA6078180273 ON entreprise');
        $this->addSql('ALTER TABLE entreprise ADD instagram_active TINYINT(1) NOT NULL, ADD instagram VARCHAR(255) NOT NULL, ADD linkedin_active TINYINT(1) NOT NULL, ADD linkedin VARCHAR(255) NOT NULL, ADD facebook_active TINYINT(1) NOT NULL, ADD facebook VARCHAR(255) NOT NULL, DROP socialmedia');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE media_social (id INT AUTO_INCREMENT NOT NULL, contact INT DEFAULT NULL, entreprise INT DEFAULT NULL, link VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, image VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, title VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, active TINYINT(1) NOT NULL, INDEX IDX_CD187B594C62E638 (contact), INDEX IDX_CD187B59D19FA60 (entreprise), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE media_social ADD CONSTRAINT FK_CD187B594C62E638 FOREIGN KEY (contact) REFERENCES contact_agrometal (id)');
        $this->addSql('ALTER TABLE media_social ADD CONSTRAINT FK_CD187B59D19FA60 FOREIGN KEY (entreprise) REFERENCES entreprise (id)');
        $this->addSql('ALTER TABLE contact_agrometal ADD socialmedia INT DEFAULT NULL');
        $this->addSql('ALTER TABLE contact_agrometal ADD CONSTRAINT FK_9DDB74C978180273 FOREIGN KEY (socialmedia) REFERENCES media_social (id)');
        $this->addSql('CREATE INDEX IDX_9DDB74C978180273 ON contact_agrometal (socialmedia)');
        $this->addSql('ALTER TABLE entreprise ADD socialmedia INT DEFAULT NULL, DROP instagram_active, DROP instagram, DROP linkedin_active, DROP linkedin, DROP facebook_active, DROP facebook');
        $this->addSql('ALTER TABLE entreprise ADD CONSTRAINT FK_D19FA6078180273 FOREIGN KEY (socialmedia) REFERENCES media_social (id)');
        $this->addSql('CREATE INDEX IDX_D19FA6078180273 ON entreprise (socialmedia)');
    }
}
