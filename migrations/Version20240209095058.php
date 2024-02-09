<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240209095058 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE energy_second_hand_car DROP FOREIGN KEY FK_B643D3D4B1C90FD4');
        $this->addSql('ALTER TABLE energy_second_hand_car DROP FOREIGN KEY FK_B643D3D4EDDF52D');
        $this->addSql('ALTER TABLE options_second_hand_car DROP FOREIGN KEY FK_48397E5CB1C90FD4');
        $this->addSql('ALTER TABLE options_second_hand_car DROP FOREIGN KEY FK_48397E5C3ADB05F1');
        $this->addSql('DROP TABLE energy_second_hand_car');
        $this->addSql('DROP TABLE options_second_hand_car');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE energy_second_hand_car (energy_id INT NOT NULL, second_hand_car_id INT NOT NULL, INDEX IDX_B643D3D4EDDF52D (energy_id), INDEX IDX_B643D3D4B1C90FD4 (second_hand_car_id), PRIMARY KEY(energy_id, second_hand_car_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE options_second_hand_car (options_id INT NOT NULL, second_hand_car_id INT NOT NULL, INDEX IDX_48397E5CB1C90FD4 (second_hand_car_id), INDEX IDX_48397E5C3ADB05F1 (options_id), PRIMARY KEY(options_id, second_hand_car_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE energy_second_hand_car ADD CONSTRAINT FK_B643D3D4B1C90FD4 FOREIGN KEY (second_hand_car_id) REFERENCES second_hand_car (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE energy_second_hand_car ADD CONSTRAINT FK_B643D3D4EDDF52D FOREIGN KEY (energy_id) REFERENCES energy (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE options_second_hand_car ADD CONSTRAINT FK_48397E5CB1C90FD4 FOREIGN KEY (second_hand_car_id) REFERENCES second_hand_car (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE options_second_hand_car ADD CONSTRAINT FK_48397E5C3ADB05F1 FOREIGN KEY (options_id) REFERENCES options (id) ON DELETE CASCADE');
    }
}
