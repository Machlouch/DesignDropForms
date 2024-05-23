<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240322164255 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE answer_session (answer_id INT NOT NULL, session_id INT NOT NULL, INDEX IDX_98041AA5AA334807 (answer_id), INDEX IDX_98041AA5613FECDF (session_id), PRIMARY KEY(answer_id, session_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE survey_session (survey_id INT NOT NULL, session_id INT NOT NULL, INDEX IDX_9468F66FB3FE509D (survey_id), INDEX IDX_9468F66F613FECDF (session_id), PRIMARY KEY(survey_id, session_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE answer_session ADD CONSTRAINT FK_98041AA5AA334807 FOREIGN KEY (answer_id) REFERENCES answer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE answer_session ADD CONSTRAINT FK_98041AA5613FECDF FOREIGN KEY (session_id) REFERENCES session (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE survey_session ADD CONSTRAINT FK_9468F66FB3FE509D FOREIGN KEY (survey_id) REFERENCES survey (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE survey_session ADD CONSTRAINT FK_9468F66F613FECDF FOREIGN KEY (session_id) REFERENCES session (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE answer ADD question_id INT NOT NULL');
        $this->addSql('ALTER TABLE answer ADD CONSTRAINT FK_DADD4A251E27F6BF FOREIGN KEY (question_id) REFERENCES question (id)');
        $this->addSql('CREATE INDEX IDX_DADD4A251E27F6BF ON answer (question_id)');
        $this->addSql('ALTER TABLE question ADD survey_id INT NOT NULL');
        $this->addSql('ALTER TABLE question ADD CONSTRAINT FK_B6F7494EB3FE509D FOREIGN KEY (survey_id) REFERENCES survey (id)');
        $this->addSql('CREATE INDEX IDX_B6F7494EB3FE509D ON question (survey_id)');
        $this->addSql('ALTER TABLE survey ADD category_id INT NOT NULL, ADD page_id INT NOT NULL, ADD company_id INT NOT NULL, ADD design_id INT NOT NULL');
        $this->addSql('ALTER TABLE survey ADD CONSTRAINT FK_AD5F9BFC12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE survey ADD CONSTRAINT FK_AD5F9BFCC4663E4 FOREIGN KEY (page_id) REFERENCES page (id)');
        $this->addSql('ALTER TABLE survey ADD CONSTRAINT FK_AD5F9BFC979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id)');
        $this->addSql('ALTER TABLE survey ADD CONSTRAINT FK_AD5F9BFCE41DC9B2 FOREIGN KEY (design_id) REFERENCES design (id)');
        $this->addSql('CREATE INDEX IDX_AD5F9BFC12469DE2 ON survey (category_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_AD5F9BFCC4663E4 ON survey (page_id)');
        $this->addSql('CREATE INDEX IDX_AD5F9BFC979B1AD6 ON survey (company_id)');
        $this->addSql('CREATE INDEX IDX_AD5F9BFCE41DC9B2 ON survey (design_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE answer_session DROP FOREIGN KEY FK_98041AA5AA334807');
        $this->addSql('ALTER TABLE answer_session DROP FOREIGN KEY FK_98041AA5613FECDF');
        $this->addSql('ALTER TABLE survey_session DROP FOREIGN KEY FK_9468F66FB3FE509D');
        $this->addSql('ALTER TABLE survey_session DROP FOREIGN KEY FK_9468F66F613FECDF');
        $this->addSql('DROP TABLE answer_session');
        $this->addSql('DROP TABLE survey_session');
        $this->addSql('ALTER TABLE answer DROP FOREIGN KEY FK_DADD4A251E27F6BF');
        $this->addSql('DROP INDEX IDX_DADD4A251E27F6BF ON answer');
        $this->addSql('ALTER TABLE answer DROP question_id');
        $this->addSql('ALTER TABLE question DROP FOREIGN KEY FK_B6F7494EB3FE509D');
        $this->addSql('DROP INDEX IDX_B6F7494EB3FE509D ON question');
        $this->addSql('ALTER TABLE question DROP survey_id');
        $this->addSql('ALTER TABLE survey DROP FOREIGN KEY FK_AD5F9BFC12469DE2');
        $this->addSql('ALTER TABLE survey DROP FOREIGN KEY FK_AD5F9BFCC4663E4');
        $this->addSql('ALTER TABLE survey DROP FOREIGN KEY FK_AD5F9BFC979B1AD6');
        $this->addSql('ALTER TABLE survey DROP FOREIGN KEY FK_AD5F9BFCE41DC9B2');
        $this->addSql('DROP INDEX IDX_AD5F9BFC12469DE2 ON survey');
        $this->addSql('DROP INDEX UNIQ_AD5F9BFCC4663E4 ON survey');
        $this->addSql('DROP INDEX IDX_AD5F9BFC979B1AD6 ON survey');
        $this->addSql('DROP INDEX IDX_AD5F9BFCE41DC9B2 ON survey');
        $this->addSql('ALTER TABLE survey DROP category_id, DROP page_id, DROP company_id, DROP design_id');
    }
}
