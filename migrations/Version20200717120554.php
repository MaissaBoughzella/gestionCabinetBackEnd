<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200717120554 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE medecin (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, photo VARCHAR(255) DEFAULT NULL, qualification VARCHAR(255) DEFAULT NULL, experience VARCHAR(255) DEFAULT NULL, formation VARCHAR(255) DEFAULT NULL, Specialite_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_1BDA53C6A76ED395 (user_id), INDEX fk_Medecin_Specialite1_idx (Specialite_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE patient (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, date_naiss DATE DEFAULT NULL, profession VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_1ADAD7EBA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rdv (id INT AUTO_INCREMENT NOT NULL, date DATE DEFAULT NULL, heure TIME DEFAULT NULL, id_consultation INT NOT NULL, Medecin_id INT DEFAULT NULL, Patient_id INT DEFAULT NULL, INDEX IDX_10C31F864F31A84 (Medecin_id), INDEX IDX_10C31F866B899279 (Patient_id), UNIQUE INDEX patient_med_unique (Patient_id, Medecin_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE secretaire (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, email VARCHAR(180) NOT NULL, password VARCHAR(255) NOT NULL, adresse VARCHAR(255) DEFAULT NULL, genre VARCHAR(45) DEFAULT NULL, langue VARCHAR(45) DEFAULT NULL, create_time DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, nom VARCHAR(45) DEFAULT NULL, prenom VARCHAR(45) DEFAULT NULL, telephone VARCHAR(45) DEFAULT NULL, medecin_id INT NOT NULL, UNIQUE INDEX UNIQ_7DB5C2D0E7927C74 (email), UNIQUE INDEX UNIQ_7DB5C2D0A76ED395 (user_id), INDEX fk_sec_med_idx (medecin_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, role_id INT DEFAULT NULL, email VARCHAR(180) NOT NULL, password VARCHAR(255) NOT NULL, adresse VARCHAR(255) DEFAULT NULL, genre VARCHAR(45) DEFAULT NULL, langue VARCHAR(45) DEFAULT NULL, create_time DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, nom VARCHAR(45) DEFAULT NULL, prenom VARCHAR(45) DEFAULT NULL, telephone VARCHAR(45) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), INDEX IDX_8D93D649D60322AC (role_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE medecin ADD CONSTRAINT FK_1BDA53C6A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE medecin ADD CONSTRAINT FK_1BDA53C692EBAB05 FOREIGN KEY (Specialite_id) REFERENCES specialite (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE patient ADD CONSTRAINT FK_1ADAD7EBA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE rdv ADD CONSTRAINT FK_10C31F864BAE1954 FOREIGN KEY (Medecin_id) REFERENCES medecin (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE rdv ADD CONSTRAINT FK_10C31F8624D491A9 FOREIGN KEY (Patient_id) REFERENCES patient (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE secretaire ADD CONSTRAINT FK_7DB5C2D0A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649D60322AC FOREIGN KEY (role_id) REFERENCES role (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rdv DROP FOREIGN KEY FK_10C31F864BAE1954');
        $this->addSql('ALTER TABLE rdv DROP FOREIGN KEY FK_10C31F8624D491A9');
        $this->addSql('ALTER TABLE medecin DROP FOREIGN KEY FK_1BDA53C6A76ED395');
        $this->addSql('ALTER TABLE patient DROP FOREIGN KEY FK_1ADAD7EBA76ED395');
        $this->addSql('ALTER TABLE secretaire DROP FOREIGN KEY FK_7DB5C2D0A76ED395');
        $this->addSql('DROP TABLE medecin');
        $this->addSql('DROP TABLE patient');
        $this->addSql('DROP TABLE rdv');
        $this->addSql('DROP TABLE secretaire');
        $this->addSql('DROP TABLE user');
    }
}
