<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200611193436 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE absence_user');
        $this->addSql('ALTER TABLE absence ADD user_id INT NOT NULL, DROP attend');
        $this->addSql('ALTER TABLE absence ADD CONSTRAINT FK_765AE0C9A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_765AE0C9A76ED395 ON absence (user_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE absence_user (absence_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_FA8218D6A76ED395 (user_id), INDEX IDX_FA8218D62DFF238F (absence_id), PRIMARY KEY(absence_id, user_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE absence_user ADD CONSTRAINT FK_FA8218D62DFF238F FOREIGN KEY (absence_id) REFERENCES absence (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE absence_user ADD CONSTRAINT FK_FA8218D6A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE absence DROP FOREIGN KEY FK_765AE0C9A76ED395');
        $this->addSql('DROP INDEX IDX_765AE0C9A76ED395 ON absence');
        $this->addSql('ALTER TABLE absence ADD attend TINYINT(1) NOT NULL, DROP user_id');
    }
}
