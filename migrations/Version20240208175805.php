<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240208175805 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE galery DROP FOREIGN KEY FK_B5D5320545317D1');
        $this->addSql('DROP INDEX IDX_B5D5320545317D1 ON galery');
        $this->addSql('ALTER TABLE galery DROP vehicle_id');
        $this->addSql('ALTER TABLE second_hand_car DROP image_name, DROP image_size, DROP updated_at');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE galery ADD vehicle_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE galery ADD CONSTRAINT FK_B5D5320545317D1 FOREIGN KEY (vehicle_id) REFERENCES second_hand_car (id)');
        $this->addSql('CREATE INDEX IDX_B5D5320545317D1 ON galery (vehicle_id)');
        $this->addSql('ALTER TABLE second_hand_car ADD image_name VARCHAR(255) DEFAULT NULL, ADD image_size INT DEFAULT NULL, ADD updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
    }
}
