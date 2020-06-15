<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200612125857 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE absence DROP FOREIGN KEY FK_765AE0C923EDC87');
        $this->addSql('DROP INDEX IDX_765AE0C923EDC87 ON absence');
        $this->addSql('ALTER TABLE absence CHANGE subject_id planning_subjects_id INT NOT NULL');
        $this->addSql('ALTER TABLE absence ADD CONSTRAINT FK_765AE0C9D9845523 FOREIGN KEY (planning_subjects_id) REFERENCES planning_subject (id)');
        $this->addSql('CREATE INDEX IDX_765AE0C9D9845523 ON absence (planning_subjects_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE absence DROP FOREIGN KEY FK_765AE0C9D9845523');
        $this->addSql('DROP INDEX IDX_765AE0C9D9845523 ON absence');
        $this->addSql('ALTER TABLE absence CHANGE planning_subjects_id subject_id INT NOT NULL');
        $this->addSql('ALTER TABLE absence ADD CONSTRAINT FK_765AE0C923EDC87 FOREIGN KEY (subject_id) REFERENCES subject (id)');
        $this->addSql('CREATE INDEX IDX_765AE0C923EDC87 ON absence (subject_id)');
    }
}
