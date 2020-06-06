<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200606153324 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE exam (id INT AUTO_INCREMENT NOT NULL, mark INT NOT NULL, date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE subject ADD exam_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE subject ADD CONSTRAINT FK_FBCE3E7A2DA198E7 FOREIGN KEY (exam_id_id) REFERENCES exam (id)');
        $this->addSql('CREATE INDEX IDX_FBCE3E7A2DA198E7 ON subject (exam_id_id)');
        $this->addSql('ALTER TABLE user ADD exam_id_id INT NOT NULL, CHANGE roles roles JSON NOT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6492DA198E7 FOREIGN KEY (exam_id_id) REFERENCES exam (id)');
        $this->addSql('CREATE INDEX IDX_8D93D6492DA198E7 ON user (exam_id_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE subject DROP FOREIGN KEY FK_FBCE3E7A2DA198E7');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6492DA198E7');
        $this->addSql('DROP TABLE exam');
        $this->addSql('DROP INDEX IDX_FBCE3E7A2DA198E7 ON subject');
        $this->addSql('ALTER TABLE subject DROP exam_id_id');
        $this->addSql('DROP INDEX IDX_8D93D6492DA198E7 ON user');
        $this->addSql('ALTER TABLE user DROP exam_id_id, CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`');
    }
}
