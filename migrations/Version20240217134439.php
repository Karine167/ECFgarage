<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240217134439 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE second_hand_car CHANGE type_id type_id INT DEFAULT NULL, CHANGE model_id model_id INT DEFAULT NULL, CHANGE doors doors SMALLINT DEFAULT NULL, CHANGE seats seats SMALLINT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE second_hand_car CHANGE type_id type_id INT NOT NULL, CHANGE model_id model_id INT NOT NULL, CHANGE doors doors SMALLINT NOT NULL, CHANGE seats seats SMALLINT NOT NULL');
    }
}
