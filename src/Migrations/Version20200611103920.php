<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200611103920 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE profil');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6492DA198E7');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6499993BF61');
        $this->addSql('DROP INDEX IDX_8D93D6499993BF61 ON user');
        $this->addSql('DROP INDEX IDX_8D93D6492DA198E7 ON user');
        $this->addSql('ALTER TABLE user ADD class_id INT DEFAULT NULL, ADD exam_id INT DEFAULT NULL, ADD email VARCHAR(60) NOT NULL, ADD is_active TINYINT(1) NOT NULL, ADD firstname VARCHAR(255) NOT NULL, ADD lastname VARCHAR(255) NOT NULL, ADD birthdate DATE NOT NULL, ADD function VARCHAR(255) NOT NULL, DROP class_id_id, DROP exam_id_id, DROP roles');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649EA000B10 FOREIGN KEY (class_id) REFERENCES classe (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649578D5E91 FOREIGN KEY (exam_id) REFERENCES exam (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON user (email)');
        $this->addSql('CREATE INDEX IDX_8D93D649EA000B10 ON user (class_id)');
        $this->addSql('CREATE INDEX IDX_8D93D649578D5E91 ON user (exam_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE profil (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, first_name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, last_name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, birthdate DATE NOT NULL, function VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, UNIQUE INDEX UNIQ_E6D6B2979D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE profil ADD CONSTRAINT FK_E6D6B2979D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649EA000B10');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649578D5E91');
        $this->addSql('DROP INDEX UNIQ_8D93D649E7927C74 ON user');
        $this->addSql('DROP INDEX IDX_8D93D649EA000B10 ON user');
        $this->addSql('DROP INDEX IDX_8D93D649578D5E91 ON user');
        $this->addSql('ALTER TABLE user ADD class_id_id INT DEFAULT NULL, ADD exam_id_id INT DEFAULT NULL, ADD roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`, DROP class_id, DROP exam_id, DROP email, DROP is_active, DROP firstname, DROP lastname, DROP birthdate, DROP function');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6492DA198E7 FOREIGN KEY (exam_id_id) REFERENCES exam (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6499993BF61 FOREIGN KEY (class_id_id) REFERENCES classe (id)');
        $this->addSql('CREATE INDEX IDX_8D93D6499993BF61 ON user (class_id_id)');
        $this->addSql('CREATE INDEX IDX_8D93D6492DA198E7 ON user (exam_id_id)');
    }
}
