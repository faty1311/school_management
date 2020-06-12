<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200611075808 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE absence (id INT AUTO_INCREMENT NOT NULL, date DATE NOT NULL, attend TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE absence_user (absence_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_FA8218D62DFF238F (absence_id), INDEX IDX_FA8218D6A76ED395 (user_id), PRIMARY KEY(absence_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE absence_subject (absence_id INT NOT NULL, subject_id INT NOT NULL, INDEX IDX_32481BF22DFF238F (absence_id), INDEX IDX_32481BF223EDC87 (subject_id), PRIMARY KEY(absence_id, subject_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE classe (id INT AUTO_INCREMENT NOT NULL, name_class VARCHAR(255) NOT NULL, level INT NOT NULL, number INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE club (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE exam (id INT AUTO_INCREMENT NOT NULL, subjects_id INT NOT NULL, mark INT NOT NULL, date DATETIME NOT NULL, INDEX IDX_38BBA6C694AF957A (subjects_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lessons (id INT AUTO_INCREMENT NOT NULL, subject_id_id INT NOT NULL, description VARCHAR(255) NOT NULL, INDEX IDX_3F4218D96ED75F8F (subject_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lessons_user (lessons_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_EA3EB798FED07355 (lessons_id), INDEX IDX_EA3EB798A76ED395 (user_id), PRIMARY KEY(lessons_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE media (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, author VARCHAR(255) NOT NULL, synopsis VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menu (id INT AUTO_INCREMENT NOT NULL, day DATE NOT NULL, entree VARCHAR(255) NOT NULL, main_course VARCHAR(255) NOT NULL, dessert VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE news (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE planning (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, class_id_id INT NOT NULL, date DATE NOT NULL, UNIQUE INDEX UNIQ_D499BFF69D86650F (user_id_id), UNIQUE INDEX UNIQ_D499BFF69993BF61 (class_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE planning_subject (planning_id INT NOT NULL, subject_id INT NOT NULL, INDEX IDX_26A363913D865311 (planning_id), INDEX IDX_26A3639123EDC87 (subject_id), PRIMARY KEY(planning_id, subject_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, birthdate DATE NOT NULL, function VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_E6D6B2979D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE subject (id INT AUTO_INCREMENT NOT NULL, exam_id_id INT NOT NULL, name VARCHAR(255) NOT NULL, coefficient INT NOT NULL, INDEX IDX_FBCE3E7A2DA198E7 (exam_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE trip (id INT AUTO_INCREMENT NOT NULL, season VARCHAR(255) NOT NULL, destination VARCHAR(255) NOT NULL, beginning DATE NOT NULL, ending DATE NOT NULL, picture VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, class_id_id INT NOT NULL, exam_id_id INT NOT NULL, username VARCHAR(255) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, INDEX IDX_8D93D6499993BF61 (class_id_id), INDEX IDX_8D93D6492DA198E7 (exam_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE absence_user ADD CONSTRAINT FK_FA8218D62DFF238F FOREIGN KEY (absence_id) REFERENCES absence (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE absence_user ADD CONSTRAINT FK_FA8218D6A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE absence_subject ADD CONSTRAINT FK_32481BF22DFF238F FOREIGN KEY (absence_id) REFERENCES absence (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE absence_subject ADD CONSTRAINT FK_32481BF223EDC87 FOREIGN KEY (subject_id) REFERENCES subject (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE exam ADD CONSTRAINT FK_38BBA6C694AF957A FOREIGN KEY (subjects_id) REFERENCES subject (id)');
        $this->addSql('ALTER TABLE lessons ADD CONSTRAINT FK_3F4218D96ED75F8F FOREIGN KEY (subject_id_id) REFERENCES subject (id)');
        $this->addSql('ALTER TABLE lessons_user ADD CONSTRAINT FK_EA3EB798FED07355 FOREIGN KEY (lessons_id) REFERENCES lessons (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lessons_user ADD CONSTRAINT FK_EA3EB798A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE planning ADD CONSTRAINT FK_D499BFF69D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE planning ADD CONSTRAINT FK_D499BFF69993BF61 FOREIGN KEY (class_id_id) REFERENCES classe (id)');
        $this->addSql('ALTER TABLE planning_subject ADD CONSTRAINT FK_26A363913D865311 FOREIGN KEY (planning_id) REFERENCES planning (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE planning_subject ADD CONSTRAINT FK_26A3639123EDC87 FOREIGN KEY (subject_id) REFERENCES subject (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE profil ADD CONSTRAINT FK_E6D6B2979D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE subject ADD CONSTRAINT FK_FBCE3E7A2DA198E7 FOREIGN KEY (exam_id_id) REFERENCES exam (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6499993BF61 FOREIGN KEY (class_id_id) REFERENCES classe (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6492DA198E7 FOREIGN KEY (exam_id_id) REFERENCES exam (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE absence_user DROP FOREIGN KEY FK_FA8218D62DFF238F');
        $this->addSql('ALTER TABLE absence_subject DROP FOREIGN KEY FK_32481BF22DFF238F');
        $this->addSql('ALTER TABLE planning DROP FOREIGN KEY FK_D499BFF69993BF61');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6499993BF61');
        $this->addSql('ALTER TABLE subject DROP FOREIGN KEY FK_FBCE3E7A2DA198E7');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6492DA198E7');
        $this->addSql('ALTER TABLE lessons_user DROP FOREIGN KEY FK_EA3EB798FED07355');
        $this->addSql('ALTER TABLE planning_subject DROP FOREIGN KEY FK_26A363913D865311');
        $this->addSql('ALTER TABLE absence_subject DROP FOREIGN KEY FK_32481BF223EDC87');
        $this->addSql('ALTER TABLE exam DROP FOREIGN KEY FK_38BBA6C694AF957A');
        $this->addSql('ALTER TABLE lessons DROP FOREIGN KEY FK_3F4218D96ED75F8F');
        $this->addSql('ALTER TABLE planning_subject DROP FOREIGN KEY FK_26A3639123EDC87');
        $this->addSql('ALTER TABLE absence_user DROP FOREIGN KEY FK_FA8218D6A76ED395');
        $this->addSql('ALTER TABLE lessons_user DROP FOREIGN KEY FK_EA3EB798A76ED395');
        $this->addSql('ALTER TABLE planning DROP FOREIGN KEY FK_D499BFF69D86650F');
        $this->addSql('ALTER TABLE profil DROP FOREIGN KEY FK_E6D6B2979D86650F');
        $this->addSql('DROP TABLE absence');
        $this->addSql('DROP TABLE absence_user');
        $this->addSql('DROP TABLE absence_subject');
        $this->addSql('DROP TABLE classe');
        $this->addSql('DROP TABLE club');
        $this->addSql('DROP TABLE exam');
        $this->addSql('DROP TABLE lessons');
        $this->addSql('DROP TABLE lessons_user');
        $this->addSql('DROP TABLE media');
        $this->addSql('DROP TABLE menu');
        $this->addSql('DROP TABLE news');
        $this->addSql('DROP TABLE planning');
        $this->addSql('DROP TABLE planning_subject');
        $this->addSql('DROP TABLE profil');
        $this->addSql('DROP TABLE subject');
        $this->addSql('DROP TABLE trip');
        $this->addSql('DROP TABLE user');
    }
}
