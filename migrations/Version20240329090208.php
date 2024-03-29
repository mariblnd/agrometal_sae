<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240329090208 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE point_carte');
        $this->addSql('ALTER TABLE entreprise ADD socialmedia INT DEFAULT NULL');
        $this->addSql('ALTER TABLE entreprise ADD CONSTRAINT FK_D19FA6078180273 FOREIGN KEY (socialmedia) REFERENCES media_social (id)');
        $this->addSql('CREATE INDEX IDX_D19FA6078180273 ON entreprise (socialmedia)');
        $this->addSql('ALTER TABLE media_social DROP FOREIGN KEY FK_CD187B59A4AEAFEA');
        $this->addSql('DROP INDEX IDX_CD187B59A4AEAFEA ON media_social');
        $this->addSql('ALTER TABLE media_social DROP entreprise_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE point_carte (id INT AUTO_INCREMENT NOT NULL, region VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, margin_top INT NOT NULL, margin_left INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE entreprise DROP FOREIGN KEY FK_D19FA6078180273');
        $this->addSql('DROP INDEX IDX_D19FA6078180273 ON entreprise');
        $this->addSql('ALTER TABLE entreprise DROP socialmedia');
        $this->addSql('ALTER TABLE media_social ADD entreprise_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE media_social ADD CONSTRAINT FK_CD187B59A4AEAFEA FOREIGN KEY (entreprise_id) REFERENCES entreprise (id)');
        $this->addSql('CREATE INDEX IDX_CD187B59A4AEAFEA ON media_social (entreprise_id)');
    }
}
