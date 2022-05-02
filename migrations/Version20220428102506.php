<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220428102506 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE rejoindre (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, cv VARCHAR(255) NOT NULL, motivation VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE presentation ADD image VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE prestations ADD image VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE rejoindre');
        $this->addSql('ALTER TABLE contact CHANGE nom nom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE mail mail VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE telephone telephone VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE objet objet VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE message message LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE document document LONGTEXT DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE home_text CHANGE hometexte hometexte LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE messenger_messages CHANGE body body LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE headers headers LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE queue_name queue_name VARCHAR(190) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE news CHANGE author author VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE body body LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE title title VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE image image VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE partenaires CHANGE categories categories VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE sous_categories sous_categories VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE nom nom LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE url url LONGTEXT DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE presentation DROP image, CHANGE titre titre VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE corp corp LONGTEXT DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE prestations DROP image, CHANGE titre titre VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE texte texte LONGTEXT DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE sous_titre1 sous_titre1 VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE sous_titre2 sous_titre2 VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE sous_titre3 sous_titre3 VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE sous_titre4 sous_titre4 VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE sous_titre5 sous_titre5 VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE body1 body1 LONGTEXT DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE body2 body2 LONGTEXT DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE body3 body3 LONGTEXT DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE body4 body4 LONGTEXT DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE body5 body5 LONGTEXT DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE sous_prestations CHANGE sous_titre sous_titre VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE texte texte LONGTEXT DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE user CHANGE email email VARCHAR(180) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE password password VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE username username VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
