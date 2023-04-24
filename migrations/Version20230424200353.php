<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230424200353 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE link_visit (id INT AUTO_INCREMENT NOT NULL, link_id INT NOT NULL, ip VARCHAR(255) NOT NULL, user_agent VARCHAR(500) DEFAULT NULL, referer VARCHAR(255) DEFAULT NULL, location_country VARCHAR(255) DEFAULT NULL, location_city VARCHAR(255) DEFAULT NULL, location_time_zone VARCHAR(255) DEFAULT NULL, location_longitude DOUBLE PRECISION DEFAULT NULL, location_latitude DOUBLE PRECISION DEFAULT NULL, location_accuracy_radius INT DEFAULT NULL, device_operating_system VARCHAR(255) DEFAULT NULL, device_client VARCHAR(255) DEFAULT NULL, device_device VARCHAR(255) DEFAULT NULL, device_is_bot TINYINT(1) DEFAULT 0 NOT NULL, INDEX IDX_ECC5B5E7ADA40271 (link_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE link_visit ADD CONSTRAINT FK_ECC5B5E7ADA40271 FOREIGN KEY (link_id) REFERENCES link (id)');
        $this->addSql('ALTER TABLE link ADD description LONGTEXT DEFAULT NULL, ADD click_count INT NOT NULL, ADD unique_visit_count INT NOT NULL, ADD total_visit_count INT NOT NULL, ADD has_automatic_redirect TINYINT(1) NOT NULL, ADD redirect_delay INT DEFAULT NULL, ADD meta_title VARCHAR(255) NOT NULL, ADD meta_description TINYTEXT DEFAULT NULL, ADD meta_canonical_url VARCHAR(255) NOT NULL, ADD meta_image VARCHAR(255) DEFAULT NULL, ADD meta_favicon VARCHAR(255) DEFAULT NULL, CHANGE updated_at updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE link_visit DROP FOREIGN KEY FK_ECC5B5E7ADA40271');
        $this->addSql('DROP TABLE link_visit');
        $this->addSql('ALTER TABLE link DROP description, DROP click_count, DROP unique_visit_count, DROP total_visit_count, DROP has_automatic_redirect, DROP redirect_delay, DROP meta_title, DROP meta_description, DROP meta_canonical_url, DROP meta_image, DROP meta_favicon, CHANGE updated_at updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
    }
}
