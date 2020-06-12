<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200611195328 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE absence_subject');
        $this->addSql('ALTER TABLE absence ADD subject_id INT NOT NULL');
        $this->addSql('ALTER TABLE absence ADD CONSTRAINT FK_765AE0C923EDC87 FOREIGN KEY (subject_id) REFERENCES subject (id)');
        $this->addSql('CREATE INDEX IDX_765AE0C923EDC87 ON absence (subject_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE absence_subject (absence_id INT NOT NULL, subject_id INT NOT NULL, INDEX IDX_32481BF223EDC87 (subject_id), INDEX IDX_32481BF22DFF238F (absence_id), PRIMARY KEY(absence_id, subject_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE absence_subject ADD CONSTRAINT FK_32481BF223EDC87 FOREIGN KEY (subject_id) REFERENCES subject (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE absence_subject ADD CONSTRAINT FK_32481BF22DFF238F FOREIGN KEY (absence_id) REFERENCES absence (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE absence DROP FOREIGN KEY FK_765AE0C923EDC87');
        $this->addSql('DROP INDEX IDX_765AE0C923EDC87 ON absence');
        $this->addSql('ALTER TABLE absence DROP subject_id');
    }
}
