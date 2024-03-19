<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240318164718 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE equipments_minus_one (id INT AUTO_INCREMENT NOT NULL, equipments_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, small_description VARCHAR(255) NOT NULL, big_description VARCHAR(1000) NOT NULL, image VARCHAR(255) NOT NULL, INDEX IDX_44C7F0DCBD251DD7 (equipments_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipments_minus_two (id INT AUTO_INCREMENT NOT NULL, equipments_minus_one_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, value VARCHAR(255) NOT NULL, INDEX IDX_2F61FC4BF36EBF8E (equipments_minus_one_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE equipments_minus_one ADD CONSTRAINT FK_44C7F0DCBD251DD7 FOREIGN KEY (equipments_id) REFERENCES equipments (id)');
        $this->addSql('ALTER TABLE equipments_minus_two ADD CONSTRAINT FK_2F61FC4BF36EBF8E FOREIGN KEY (equipments_minus_one_id) REFERENCES equipments_minus_one (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE equipments_minus_one DROP FOREIGN KEY FK_44C7F0DCBD251DD7');
        $this->addSql('ALTER TABLE equipments_minus_two DROP FOREIGN KEY FK_2F61FC4BF36EBF8E');
        $this->addSql('DROP TABLE equipments_minus_one');
        $this->addSql('DROP TABLE equipments_minus_two');
    }
}
