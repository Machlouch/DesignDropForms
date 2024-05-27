<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240523150602 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE answer CHANGE iscorrect iscorrect TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE question ADD font_family VARCHAR(255) NOT NULL, ADD font_size VARCHAR(50) NOT NULL, ADD text_style VARCHAR(255) NOT NULL, ADD text_alignment VARCHAR(50) NOT NULL, ADD button_font_family VARCHAR(255) NOT NULL, ADD button_text_style VARCHAR(255) NOT NULL, ADD button_text_alignment VARCHAR(50) NOT NULL, ADD button_background_size VARCHAR(50) NOT NULL, ADD button_radius INT NOT NULL, CHANGE description description VARCHAR(255) NOT NULL, CHANGE contenu contenu VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE answer CHANGE iscorrect iscorrect TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE question DROP font_family, DROP font_size, DROP text_style, DROP text_alignment, DROP button_font_family, DROP button_text_style, DROP button_text_alignment, DROP button_background_size, DROP button_radius, CHANGE description description VARCHAR(255) DEFAULT NULL, CHANGE contenu contenu VARCHAR(255) DEFAULT NULL');
    }
}
