<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240209093357 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE second_hand_car_color (second_hand_car_id INT NOT NULL, color_id INT NOT NULL, INDEX IDX_90F3E808B1C90FD4 (second_hand_car_id), INDEX IDX_90F3E8087ADA1FB5 (color_id), PRIMARY KEY(second_hand_car_id, color_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE second_hand_car_color ADD CONSTRAINT FK_90F3E808B1C90FD4 FOREIGN KEY (second_hand_car_id) REFERENCES second_hand_car (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE second_hand_car_color ADD CONSTRAINT FK_90F3E8087ADA1FB5 FOREIGN KEY (color_id) REFERENCES color (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE color_second_hand_car DROP FOREIGN KEY FK_8C16589C7ADA1FB5');
        $this->addSql('ALTER TABLE color_second_hand_car DROP FOREIGN KEY FK_8C16589CB1C90FD4');
        $this->addSql('DROP TABLE color_second_hand_car');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE color_second_hand_car (color_id INT NOT NULL, second_hand_car_id INT NOT NULL, INDEX IDX_8C16589C7ADA1FB5 (color_id), INDEX IDX_8C16589CB1C90FD4 (second_hand_car_id), PRIMARY KEY(color_id, second_hand_car_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE color_second_hand_car ADD CONSTRAINT FK_8C16589C7ADA1FB5 FOREIGN KEY (color_id) REFERENCES color (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE color_second_hand_car ADD CONSTRAINT FK_8C16589CB1C90FD4 FOREIGN KEY (second_hand_car_id) REFERENCES second_hand_car (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE second_hand_car_color DROP FOREIGN KEY FK_90F3E808B1C90FD4');
        $this->addSql('ALTER TABLE second_hand_car_color DROP FOREIGN KEY FK_90F3E8087ADA1FB5');
        $this->addSql('DROP TABLE second_hand_car_color');
    }
}
