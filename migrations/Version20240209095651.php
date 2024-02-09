<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240209095651 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE second_hand_car_energy (second_hand_car_id INT NOT NULL, energy_id INT NOT NULL, INDEX IDX_40EA0EDFB1C90FD4 (second_hand_car_id), INDEX IDX_40EA0EDFEDDF52D (energy_id), PRIMARY KEY(second_hand_car_id, energy_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE second_hand_car_equipments (second_hand_car_id INT NOT NULL, equipments_id INT NOT NULL, INDEX IDX_AAE60B9EB1C90FD4 (second_hand_car_id), INDEX IDX_AAE60B9EBD251DD7 (equipments_id), PRIMARY KEY(second_hand_car_id, equipments_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE second_hand_car_options (second_hand_car_id INT NOT NULL, options_id INT NOT NULL, INDEX IDX_41866D67B1C90FD4 (second_hand_car_id), INDEX IDX_41866D673ADB05F1 (options_id), PRIMARY KEY(second_hand_car_id, options_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE second_hand_car_energy ADD CONSTRAINT FK_40EA0EDFB1C90FD4 FOREIGN KEY (second_hand_car_id) REFERENCES second_hand_car (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE second_hand_car_energy ADD CONSTRAINT FK_40EA0EDFEDDF52D FOREIGN KEY (energy_id) REFERENCES energy (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE second_hand_car_equipments ADD CONSTRAINT FK_AAE60B9EB1C90FD4 FOREIGN KEY (second_hand_car_id) REFERENCES second_hand_car (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE second_hand_car_equipments ADD CONSTRAINT FK_AAE60B9EBD251DD7 FOREIGN KEY (equipments_id) REFERENCES equipments (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE second_hand_car_options ADD CONSTRAINT FK_41866D67B1C90FD4 FOREIGN KEY (second_hand_car_id) REFERENCES second_hand_car (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE second_hand_car_options ADD CONSTRAINT FK_41866D673ADB05F1 FOREIGN KEY (options_id) REFERENCES options (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE second_hand_car_energy DROP FOREIGN KEY FK_40EA0EDFB1C90FD4');
        $this->addSql('ALTER TABLE second_hand_car_energy DROP FOREIGN KEY FK_40EA0EDFEDDF52D');
        $this->addSql('ALTER TABLE second_hand_car_equipments DROP FOREIGN KEY FK_AAE60B9EB1C90FD4');
        $this->addSql('ALTER TABLE second_hand_car_equipments DROP FOREIGN KEY FK_AAE60B9EBD251DD7');
        $this->addSql('ALTER TABLE second_hand_car_options DROP FOREIGN KEY FK_41866D67B1C90FD4');
        $this->addSql('ALTER TABLE second_hand_car_options DROP FOREIGN KEY FK_41866D673ADB05F1');
        $this->addSql('DROP TABLE second_hand_car_energy');
        $this->addSql('DROP TABLE second_hand_car_equipments');
        $this->addSql('DROP TABLE second_hand_car_options');
    }
}
