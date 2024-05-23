<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240319151951 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE design (id INT AUTO_INCREMENT NOT NULL, logo VARCHAR(255) DEFAULT NULL, background_color VARCHAR(255) DEFAULT NULL, background_url VARCHAR(255) DEFAULT NULL, background_style VARCHAR(255) DEFAULT NULL, font VARCHAR(255) NOT NULL, color VARCHAR(255) DEFAULT NULL, fontsize INT DEFAULT NULL, is_bold TINYINT(1) DEFAULT NULL, is_italic TINYINT(1) DEFAULT NULL, is_underline TINYINT(1) DEFAULT NULL, align VARCHAR(255) DEFAULT NULL, card_opacity DOUBLE PRECISION DEFAULT NULL, card_background_color VARCHAR(255) DEFAULT NULL, card_border_color VARCHAR(255) DEFAULT NULL, card_border_size VARCHAR(255) DEFAULT NULL, card_riduis VARCHAR(255) DEFAULT NULL, button_background_color VARCHAR(255) DEFAULT NULL, button_border_color VARCHAR(255) DEFAULT NULL, button_style VARCHAR(255) DEFAULT NULL, button_riduis VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE design');
    }
}
