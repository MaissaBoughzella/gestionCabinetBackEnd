<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200708110150 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE fos_user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, username_canonical VARCHAR(180) NOT NULL, email VARCHAR(180) NOT NULL, email_canonical VARCHAR(180) NOT NULL, enabled TINYINT(1) NOT NULL, salt VARCHAR(255) DEFAULT NULL, password VARCHAR(255) NOT NULL, last_login DATETIME DEFAULT NULL, confirmation_token VARCHAR(180) DEFAULT NULL, password_requested_at DATETIME DEFAULT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', UNIQUE INDEX UNIQ_957A647992FC23A8 (username_canonical), UNIQUE INDEX UNIQ_957A6479A0D96FBF (email_canonical), UNIQUE INDEX UNIQ_957A6479C05FB297 (confirmation_token), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE analyse CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE Consultation_id Consultation_id INT DEFAULT NULL, CHANGE TypeAnalyse_id TypeAnalyse_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE consultation CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE id_ordonnance id_ordonnance INT DEFAULT NULL');
        $this->addSql('ALTER TABLE imageradio CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE Consultation_id Consultation_id INT DEFAULT NULL, CHANGE TypeRadio_id TypeRadio_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE medecin DROP FOREIGN KEY fk_Medecin_User1');
        $this->addSql('ALTER TABLE medecin CHANGE Specialite_id Specialite_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE medecin ADD CONSTRAINT FK_1BDA53C668D3EA09 FOREIGN KEY (User_id) REFERENCES fos_user (id)');
        $this->addSql('ALTER TABLE medicament CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE ordonnance CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE patient DROP FOREIGN KEY fk_Patient_User1');
        $this->addSql('ALTER TABLE patient ADD CONSTRAINT FK_1ADAD7EB68D3EA09 FOREIGN KEY (User_id) REFERENCES fos_user (id)');
        $this->addSql('ALTER TABLE prescription DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE prescription ADD PRIMARY KEY (id, Medicament_id, Ordonnance_id)');
        $this->addSql('ALTER TABLE rendez-vous DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE rendez-vous CHANGE id_consultation id_consultation INT DEFAULT NULL');
        $this->addSql('ALTER TABLE rendez-vous ADD PRIMARY KEY (id, Medecin_User_id, Patient_User_id)');
        $this->addSql('ALTER TABLE role CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE secretaire DROP FOREIGN KEY fk_Secrétaire_User1');
        $this->addSql('ALTER TABLE secretaire CHANGE Medecin_User_id Medecin_User_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE secretaire ADD CONSTRAINT FK_7DB5C2D068D3EA09 FOREIGN KEY (User_id) REFERENCES fos_user (id)');
        $this->addSql('ALTER TABLE specialite CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE superadmin DROP FOREIGN KEY fk_SuperAdmin_User1');
        $this->addSql('ALTER TABLE superadmin ADD CONSTRAINT FK_39D8740468D3EA09 FOREIGN KEY (User_id) REFERENCES fos_user (id)');
        $this->addSql('ALTER TABLE typeanalyse CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE typeradio CHANGE id id INT AUTO_INCREMENT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE medecin DROP FOREIGN KEY FK_1BDA53C668D3EA09');
        $this->addSql('ALTER TABLE patient DROP FOREIGN KEY FK_1ADAD7EB68D3EA09');
        $this->addSql('ALTER TABLE secretaire DROP FOREIGN KEY FK_7DB5C2D068D3EA09');
        $this->addSql('ALTER TABLE superadmin DROP FOREIGN KEY FK_39D8740468D3EA09');
        $this->addSql('DROP TABLE fos_user');
        $this->addSql('ALTER TABLE analyse CHANGE id id INT NOT NULL, CHANGE Consultation_id Consultation_id INT NOT NULL, CHANGE TypeAnalyse_id TypeAnalyse_id INT NOT NULL');
        $this->addSql('ALTER TABLE consultation CHANGE id id INT NOT NULL, CHANGE id_ordonnance id_ordonnance INT NOT NULL');
        $this->addSql('ALTER TABLE imageradio CHANGE id id INT NOT NULL, CHANGE Consultation_id Consultation_id INT NOT NULL, CHANGE TypeRadio_id TypeRadio_id INT NOT NULL');
        $this->addSql('ALTER TABLE medecin CHANGE Specialite_id Specialite_id INT NOT NULL');
        $this->addSql('ALTER TABLE medecin ADD CONSTRAINT fk_Medecin_User1 FOREIGN KEY (User_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE medicament CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE ordonnance CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE patient ADD CONSTRAINT fk_Patient_User1 FOREIGN KEY (User_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE prescription DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE prescription ADD PRIMARY KEY (id, Ordonnance_id, Medicament_id)');
        $this->addSql('ALTER TABLE rendez-vous DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE rendez-vous CHANGE id_consultation id_consultation INT NOT NULL');
        $this->addSql('ALTER TABLE rendez-vous ADD PRIMARY KEY (id, Patient_User_id, Medecin_User_id)');
        $this->addSql('ALTER TABLE role CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE secretaire CHANGE Medecin_User_id Medecin_User_id INT NOT NULL');
        $this->addSql('ALTER TABLE secretaire ADD CONSTRAINT fk_Secrétaire_User1 FOREIGN KEY (User_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE specialite CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE superadmin ADD CONSTRAINT fk_SuperAdmin_User1 FOREIGN KEY (User_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE typeanalyse CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE typeradio CHANGE id id INT NOT NULL');
    }
}
