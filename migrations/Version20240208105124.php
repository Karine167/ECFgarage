<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240208105124 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE brand (id INT AUTO_INCREMENT NOT NULL, brand VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE color (id INT AUTO_INCREMENT NOT NULL, color VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE color_second_hand_car (color_id INT NOT NULL, second_hand_car_id INT NOT NULL, INDEX IDX_8C16589C7ADA1FB5 (color_id), INDEX IDX_8C16589CB1C90FD4 (second_hand_car_id), PRIMARY KEY(color_id, second_hand_car_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(50) NOT NULL, last_name VARCHAR(50) NOT NULL, email VARCHAR(255) NOT NULL, telephon VARCHAR(20) NOT NULL, content LONGTEXT NOT NULL, acceptance TINYINT(1) NOT NULL, comment LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact_user (contact_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_A56C54B6E7A1254A (contact_id), INDEX IDX_A56C54B6A76ED395 (user_id), PRIMARY KEY(contact_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE energy (id INT AUTO_INCREMENT NOT NULL, energy VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE energy_second_hand_car (energy_id INT NOT NULL, second_hand_car_id INT NOT NULL, INDEX IDX_B643D3D4EDDF52D (energy_id), INDEX IDX_B643D3D4B1C90FD4 (second_hand_car_id), PRIMARY KEY(energy_id, second_hand_car_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipments (id INT AUTO_INCREMENT NOT NULL, equipment VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipments_second_hand_car (equipments_id INT NOT NULL, second_hand_car_id INT NOT NULL, INDEX IDX_8EDA2F64BD251DD7 (equipments_id), INDEX IDX_8EDA2F64B1C90FD4 (second_hand_car_id), PRIMARY KEY(equipments_id, second_hand_car_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE galery (id INT AUTO_INCREMENT NOT NULL, vehicle_id INT NOT NULL, picture VARCHAR(255) NOT NULL, INDEX IDX_B5D5320545317D1 (vehicle_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE model (id INT AUTO_INCREMENT NOT NULL, brand_id INT NOT NULL, model VARCHAR(255) NOT NULL, INDEX IDX_D79572D944F5D008 (brand_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE options (id INT AUTO_INCREMENT NOT NULL, option_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE options_second_hand_car (options_id INT NOT NULL, second_hand_car_id INT NOT NULL, INDEX IDX_48397E5C3ADB05F1 (options_id), INDEX IDX_48397E5CB1C90FD4 (second_hand_car_id), PRIMARY KEY(options_id, second_hand_car_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE review (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, username VARCHAR(50) NOT NULL, content LONGTEXT NOT NULL, rate SMALLINT NOT NULL, approved TINYINT(1) NOT NULL, INDEX IDX_794381C6A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE second_hand_car (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, type_id INT NOT NULL, model_id INT NOT NULL, reference VARCHAR(255) DEFAULT NULL, price NUMERIC(12, 2) NOT NULL, kilometers INT NOT NULL, circulation_year DATE NOT NULL, fiscal_power SMALLINT DEFAULT NULL, din_power SMALLINT DEFAULT NULL, doors SMALLINT NOT NULL, seats SMALLINT NOT NULL, auto_gear_box TINYINT(1) NOT NULL, critair_nb SMALLINT DEFAULT NULL, create_date DATE NOT NULL, INDEX IDX_3DA7E38FA76ED395 (user_id), INDEX IDX_3DA7E38FC54C8C93 (type_id), INDEX IDX_3DA7E38F7975B7E7 (model_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE color_second_hand_car ADD CONSTRAINT FK_8C16589C7ADA1FB5 FOREIGN KEY (color_id) REFERENCES color (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE color_second_hand_car ADD CONSTRAINT FK_8C16589CB1C90FD4 FOREIGN KEY (second_hand_car_id) REFERENCES second_hand_car (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE contact_user ADD CONSTRAINT FK_A56C54B6E7A1254A FOREIGN KEY (contact_id) REFERENCES contact (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE contact_user ADD CONSTRAINT FK_A56C54B6A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE energy_second_hand_car ADD CONSTRAINT FK_B643D3D4EDDF52D FOREIGN KEY (energy_id) REFERENCES energy (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE energy_second_hand_car ADD CONSTRAINT FK_B643D3D4B1C90FD4 FOREIGN KEY (second_hand_car_id) REFERENCES second_hand_car (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE equipments_second_hand_car ADD CONSTRAINT FK_8EDA2F64BD251DD7 FOREIGN KEY (equipments_id) REFERENCES equipments (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE equipments_second_hand_car ADD CONSTRAINT FK_8EDA2F64B1C90FD4 FOREIGN KEY (second_hand_car_id) REFERENCES second_hand_car (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE galery ADD CONSTRAINT FK_B5D5320545317D1 FOREIGN KEY (vehicle_id) REFERENCES second_hand_car (id)');
        $this->addSql('ALTER TABLE model ADD CONSTRAINT FK_D79572D944F5D008 FOREIGN KEY (brand_id) REFERENCES brand (id)');
        $this->addSql('ALTER TABLE options_second_hand_car ADD CONSTRAINT FK_48397E5C3ADB05F1 FOREIGN KEY (options_id) REFERENCES options (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE options_second_hand_car ADD CONSTRAINT FK_48397E5CB1C90FD4 FOREIGN KEY (second_hand_car_id) REFERENCES second_hand_car (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE review ADD CONSTRAINT FK_794381C6A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE second_hand_car ADD CONSTRAINT FK_3DA7E38FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE second_hand_car ADD CONSTRAINT FK_3DA7E38FC54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE second_hand_car ADD CONSTRAINT FK_3DA7E38F7975B7E7 FOREIGN KEY (model_id) REFERENCES model (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE color_second_hand_car DROP FOREIGN KEY FK_8C16589C7ADA1FB5');
        $this->addSql('ALTER TABLE color_second_hand_car DROP FOREIGN KEY FK_8C16589CB1C90FD4');
        $this->addSql('ALTER TABLE contact_user DROP FOREIGN KEY FK_A56C54B6E7A1254A');
        $this->addSql('ALTER TABLE contact_user DROP FOREIGN KEY FK_A56C54B6A76ED395');
        $this->addSql('ALTER TABLE energy_second_hand_car DROP FOREIGN KEY FK_B643D3D4EDDF52D');
        $this->addSql('ALTER TABLE energy_second_hand_car DROP FOREIGN KEY FK_B643D3D4B1C90FD4');
        $this->addSql('ALTER TABLE equipments_second_hand_car DROP FOREIGN KEY FK_8EDA2F64BD251DD7');
        $this->addSql('ALTER TABLE equipments_second_hand_car DROP FOREIGN KEY FK_8EDA2F64B1C90FD4');
        $this->addSql('ALTER TABLE galery DROP FOREIGN KEY FK_B5D5320545317D1');
        $this->addSql('ALTER TABLE model DROP FOREIGN KEY FK_D79572D944F5D008');
        $this->addSql('ALTER TABLE options_second_hand_car DROP FOREIGN KEY FK_48397E5C3ADB05F1');
        $this->addSql('ALTER TABLE options_second_hand_car DROP FOREIGN KEY FK_48397E5CB1C90FD4');
        $this->addSql('ALTER TABLE review DROP FOREIGN KEY FK_794381C6A76ED395');
        $this->addSql('ALTER TABLE second_hand_car DROP FOREIGN KEY FK_3DA7E38FA76ED395');
        $this->addSql('ALTER TABLE second_hand_car DROP FOREIGN KEY FK_3DA7E38FC54C8C93');
        $this->addSql('ALTER TABLE second_hand_car DROP FOREIGN KEY FK_3DA7E38F7975B7E7');
        $this->addSql('DROP TABLE brand');
        $this->addSql('DROP TABLE color');
        $this->addSql('DROP TABLE color_second_hand_car');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE contact_user');
        $this->addSql('DROP TABLE energy');
        $this->addSql('DROP TABLE energy_second_hand_car');
        $this->addSql('DROP TABLE equipments');
        $this->addSql('DROP TABLE equipments_second_hand_car');
        $this->addSql('DROP TABLE galery');
        $this->addSql('DROP TABLE model');
        $this->addSql('DROP TABLE options');
        $this->addSql('DROP TABLE options_second_hand_car');
        $this->addSql('DROP TABLE review');
        $this->addSql('DROP TABLE second_hand_car');
        $this->addSql('DROP TABLE type');
    }
}
