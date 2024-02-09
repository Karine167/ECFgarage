<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240209094818 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE equipments_second_hand_car DROP FOREIGN KEY FK_8EDA2F64BD251DD7');
        $this->addSql('ALTER TABLE equipments_second_hand_car DROP FOREIGN KEY FK_8EDA2F64B1C90FD4');
        $this->addSql('DROP TABLE equipments_second_hand_car');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE equipments_second_hand_car (equipments_id INT NOT NULL, second_hand_car_id INT NOT NULL, INDEX IDX_8EDA2F64BD251DD7 (equipments_id), INDEX IDX_8EDA2F64B1C90FD4 (second_hand_car_id), PRIMARY KEY(equipments_id, second_hand_car_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE equipments_second_hand_car ADD CONSTRAINT FK_8EDA2F64BD251DD7 FOREIGN KEY (equipments_id) REFERENCES equipments (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE equipments_second_hand_car ADD CONSTRAINT FK_8EDA2F64B1C90FD4 FOREIGN KEY (second_hand_car_id) REFERENCES second_hand_car (id) ON DELETE CASCADE');
    }
}
