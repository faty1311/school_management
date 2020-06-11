<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200611211954 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE planning DROP FOREIGN KEY FK_D499BFF69993BF61');
        $this->addSql('DROP INDEX UNIQ_D499BFF69993BF61 ON planning');
        $this->addSql('ALTER TABLE planning CHANGE class_id_id class_id INT NOT NULL');
        $this->addSql('ALTER TABLE planning ADD CONSTRAINT FK_D499BFF6EA000B10 FOREIGN KEY (class_id) REFERENCES classe (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D499BFF6EA000B10 ON planning (class_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE planning DROP FOREIGN KEY FK_D499BFF6EA000B10');
        $this->addSql('DROP INDEX UNIQ_D499BFF6EA000B10 ON planning');
        $this->addSql('ALTER TABLE planning CHANGE class_id class_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE planning ADD CONSTRAINT FK_D499BFF69993BF61 FOREIGN KEY (class_id_id) REFERENCES classe (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D499BFF69993BF61 ON planning (class_id_id)');
    }
}
