SET FOREIGN_KEY_CHECKS = 0;

 The following SQL statements will be executed:

     DROP TABLE doctrine_migration_versions;
     ALTER TABLE consultation CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE id_ordonnance id_ordonnance INT DEFAULT NULL, CHANGE date date DATE NOT NULL;
     ALTER TABLE imageradio CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE Consultation_id Consultation_id INT DEFAULT NULL, CHANGE TypeRadio_id TypeRadio_id INT DEFAULT NULL;
     ALTER TABLE medecin DROP FOREIGN KEY fk_Medecin_User1;
     ALTER TABLE medecin CHANGE Specialite_id Specialite_id INT DEFAULT NULL;
     ALTER TABLE medicament CHANGE id id INT AUTO_INCREMENT NOT NULL;
     ALTER TABLE ordonnance CHANGE id id INT AUTO_INCREMENT NOT NULL;
     ALTER TABLE patient DROP FOREIGN KEY fk_Patient_User1;
     ALTER TABLE prescription DROP PRIMARY KEY;
     ALTER TABLE prescription ADD PRIMARY KEY (id, Medicament_id, Ordonnance_id);
     ALTER TABLE rendez-vous DROP PRIMARY KEY;
     ALTER TABLE rendez-vous CHANGE id_consultation id_consultation INT DEFAULT NULL;
     ALTER TABLE rendez-vous ADD PRIMARY KEY (id, Medecin_User_id, Patient_User_id);
     ALTER TABLE role CHANGE id id INT AUTO_INCREMENT NOT NULL;
     ALTER TABLE secretaire DROP FOREIGN KEY fk_Secr├®taire_User1;
     ALTER TABLE secretaire CHANGE Medecin_User_id Medecin_User_id INT DEFAULT NULL;
     ALTER TABLE specialite CHANGE id id INT AUTO_INCREMENT NOT NULL;
     ALTER TABLE superadmin DROP FOREIGN KEY fk_SuperAdmin_User1;
     ALTER TABLE typeanalyse CHANGE id id INT AUTO_INCREMENT NOT NULL;
     ALTER TABLE typeradio CHANGE id id INT AUTO_INCREMENT NOT NULL;
    
