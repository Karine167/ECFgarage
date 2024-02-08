<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240208180803 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE galery ADD vehicle_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE galery ADD CONSTRAINT FK_B5D5320545317D1 FOREIGN KEY (vehicle_id) REFERENCES second_hand_car (id)');
        $this->addSql('CREATE INDEX IDX_B5D5320545317D1 ON galery (vehicle_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE galery DROP FOREIGN KEY FK_B5D5320545317D1');
        $this->addSql('DROP INDEX IDX_B5D5320545317D1 ON galery');
        $this->addSql('ALTER TABLE galery DROP vehicle_id');
    }
}
