<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200611215726 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE planning ADD title VARCHAR(255) NOT NULL, DROP date');
        $this->addSql('ALTER TABLE planning_subject DROP FOREIGN KEY FK_26A3639123EDC87');
        $this->addSql('ALTER TABLE planning_subject DROP FOREIGN KEY FK_26A363913D865311');
        $this->addSql('ALTER TABLE planning_subject ADD id INT AUTO_INCREMENT NOT NULL, ADD startdate DATETIME NOT NULL, ADD enddate DATETIME NOT NULL, CHANGE planning_id planning_id INT DEFAULT NULL, CHANGE subject_id subject_id INT DEFAULT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE planning_subject ADD CONSTRAINT FK_26A3639123EDC87 FOREIGN KEY (subject_id) REFERENCES subject (id)');
        $this->addSql('ALTER TABLE planning_subject ADD CONSTRAINT FK_26A363913D865311 FOREIGN KEY (planning_id) REFERENCES planning (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE planning ADD date DATE NOT NULL, DROP title');
        $this->addSql('ALTER TABLE planning_subject MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE planning_subject DROP FOREIGN KEY FK_26A363913D865311');
        $this->addSql('ALTER TABLE planning_subject DROP FOREIGN KEY FK_26A3639123EDC87');
        $this->addSql('ALTER TABLE planning_subject DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE planning_subject DROP id, DROP startdate, DROP enddate, CHANGE planning_id planning_id INT NOT NULL, CHANGE subject_id subject_id INT NOT NULL');
        $this->addSql('ALTER TABLE planning_subject ADD CONSTRAINT FK_26A363913D865311 FOREIGN KEY (planning_id) REFERENCES planning (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE planning_subject ADD CONSTRAINT FK_26A3639123EDC87 FOREIGN KEY (subject_id) REFERENCES subject (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE planning_subject ADD PRIMARY KEY (planning_id, subject_id)');
    }
}
