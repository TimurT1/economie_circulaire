<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220508210129 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE categorie_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE localisation_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE mot_cles_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE type_de_matiere_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE categorie (id INT NOT NULL, nom_categorie VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE categorie_annonce (categorie_id INT NOT NULL, annonce_id INT NOT NULL, PRIMARY KEY(categorie_id, annonce_id))');
        $this->addSql('CREATE INDEX IDX_A9D63D47BCF5E72D ON categorie_annonce (categorie_id)');
        $this->addSql('CREATE INDEX IDX_A9D63D478805AB2F ON categorie_annonce (annonce_id)');
        $this->addSql('CREATE TABLE localisation (id INT NOT NULL, adresse VARCHAR(255) DEFAULT NULL, code_postal VARCHAR(255) DEFAULT NULL, longitude DOUBLE PRECISION NOT NULL, latitude DOUBLE PRECISION NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE localisation_entreprise (localisation_id INT NOT NULL, entreprise_id INT NOT NULL, PRIMARY KEY(localisation_id, entreprise_id))');
        $this->addSql('CREATE INDEX IDX_CE614CA4C68BE09C ON localisation_entreprise (localisation_id)');
        $this->addSql('CREATE INDEX IDX_CE614CA4A4AEAFEA ON localisation_entreprise (entreprise_id)');
        $this->addSql('CREATE TABLE localisation_annonce (localisation_id INT NOT NULL, annonce_id INT NOT NULL, PRIMARY KEY(localisation_id, annonce_id))');
        $this->addSql('CREATE INDEX IDX_9219F07CC68BE09C ON localisation_annonce (localisation_id)');
        $this->addSql('CREATE INDEX IDX_9219F07C8805AB2F ON localisation_annonce (annonce_id)');
        $this->addSql('CREATE TABLE mot_cles (id INT NOT NULL, nom_mot_cles VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE mot_cles_annonce (mot_cles_id INT NOT NULL, annonce_id INT NOT NULL, PRIMARY KEY(mot_cles_id, annonce_id))');
        $this->addSql('CREATE INDEX IDX_BE2FB3D855234A9 ON mot_cles_annonce (mot_cles_id)');
        $this->addSql('CREATE INDEX IDX_BE2FB3D8805AB2F ON mot_cles_annonce (annonce_id)');
        $this->addSql('CREATE TABLE type_de_matiere (id INT NOT NULL, nom_type_de_matiere VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE categorie_annonce ADD CONSTRAINT FK_A9D63D47BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE categorie_annonce ADD CONSTRAINT FK_A9D63D478805AB2F FOREIGN KEY (annonce_id) REFERENCES annonce (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE localisation_entreprise ADD CONSTRAINT FK_CE614CA4C68BE09C FOREIGN KEY (localisation_id) REFERENCES localisation (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE localisation_entreprise ADD CONSTRAINT FK_CE614CA4A4AEAFEA FOREIGN KEY (entreprise_id) REFERENCES entreprise (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE localisation_annonce ADD CONSTRAINT FK_9219F07CC68BE09C FOREIGN KEY (localisation_id) REFERENCES localisation (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE localisation_annonce ADD CONSTRAINT FK_9219F07C8805AB2F FOREIGN KEY (annonce_id) REFERENCES annonce (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE mot_cles_annonce ADD CONSTRAINT FK_BE2FB3D855234A9 FOREIGN KEY (mot_cles_id) REFERENCES mot_cles (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE mot_cles_annonce ADD CONSTRAINT FK_BE2FB3D8805AB2F FOREIGN KEY (annonce_id) REFERENCES annonce (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE annonce ADD type_de_matiere_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E5FD82C9AB FOREIGN KEY (type_de_matiere_id) REFERENCES type_de_matiere (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_F65593E5FD82C9AB ON annonce (type_de_matiere_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE categorie_annonce DROP CONSTRAINT FK_A9D63D47BCF5E72D');
        $this->addSql('ALTER TABLE localisation_entreprise DROP CONSTRAINT FK_CE614CA4C68BE09C');
        $this->addSql('ALTER TABLE localisation_annonce DROP CONSTRAINT FK_9219F07CC68BE09C');
        $this->addSql('ALTER TABLE mot_cles_annonce DROP CONSTRAINT FK_BE2FB3D855234A9');
        $this->addSql('ALTER TABLE annonce DROP CONSTRAINT FK_F65593E5FD82C9AB');
        $this->addSql('DROP SEQUENCE categorie_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE localisation_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE mot_cles_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE type_de_matiere_id_seq CASCADE');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE categorie_annonce');
        $this->addSql('DROP TABLE localisation');
        $this->addSql('DROP TABLE localisation_entreprise');
        $this->addSql('DROP TABLE localisation_annonce');
        $this->addSql('DROP TABLE mot_cles');
        $this->addSql('DROP TABLE mot_cles_annonce');
        $this->addSql('DROP TABLE type_de_matiere');
        $this->addSql('DROP INDEX IDX_F65593E5FD82C9AB');
        $this->addSql('ALTER TABLE annonce DROP type_de_matiere_id');
    }
}
