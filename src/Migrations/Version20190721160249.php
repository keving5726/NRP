<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190721160249 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sex (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(20) NOT NULL, UNIQUE INDEX UNIQ_EFA269F78CDE5729 (type), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE marital_status (id INT AUTO_INCREMENT NOT NULL, status VARCHAR(30) NOT NULL, UNIQUE INDEX UNIQ_F6B06AA87B00651C (status), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, identification_card VARCHAR(10) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_8D93D649FF817607 (identification_card), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pet_type (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(30) NOT NULL, UNIQUE INDEX UNIQ_9796B2438CDE5729 (type), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pet (id INT AUTO_INCREMENT NOT NULL, sex_id INT NOT NULL, type_id INT NOT NULL, user_identification_id INT NOT NULL, name VARCHAR(50) NOT NULL, birthdate DATE NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_E4529B855A2DB2A0 (sex_id), INDEX IDX_E4529B85C54C8C93 (type_id), INDEX IDX_E4529B85B5E181AE (user_identification_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE address (id INT AUTO_INCREMENT NOT NULL, user_identification_id INT NOT NULL, state VARCHAR(100) NOT NULL, city VARCHAR(100) NOT NULL, street VARCHAR(100) NOT NULL, postcode INT NOT NULL, UNIQUE INDEX UNIQ_D4E6F81B5E181AE (user_identification_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profile (id INT AUTO_INCREMENT NOT NULL, user_identification_id INT NOT NULL, sex_id INT NOT NULL, marital_status_id INT NOT NULL, first_name VARCHAR(50) NOT NULL, last_name VARCHAR(50) NOT NULL, birthdate DATE NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_8157AA0FB5E181AE (user_identification_id), INDEX IDX_8157AA0F5A2DB2A0 (sex_id), INDEX IDX_8157AA0FE559F9BF (marital_status_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rememberme_token (series CHAR(88) NOT NULL, value CHAR(88) NOT NULL, lastUsed DATETIME NOT NULL, class VARCHAR(100) NOT NULL, username VARCHAR(200) NOT NULL, UNIQUE INDEX series (series), PRIMARY KEY(series)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE pet ADD CONSTRAINT FK_E4529B855A2DB2A0 FOREIGN KEY (sex_id) REFERENCES sex (id)');
        $this->addSql('ALTER TABLE pet ADD CONSTRAINT FK_E4529B85C54C8C93 FOREIGN KEY (type_id) REFERENCES pet_type (id)');
        $this->addSql('ALTER TABLE pet ADD CONSTRAINT FK_E4529B85B5E181AE FOREIGN KEY (user_identification_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE address ADD CONSTRAINT FK_D4E6F81B5E181AE FOREIGN KEY (user_identification_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE profile ADD CONSTRAINT FK_8157AA0FB5E181AE FOREIGN KEY (user_identification_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE profile ADD CONSTRAINT FK_8157AA0F5A2DB2A0 FOREIGN KEY (sex_id) REFERENCES sex (id)');
        $this->addSql('ALTER TABLE profile ADD CONSTRAINT FK_8157AA0FE559F9BF FOREIGN KEY (marital_status_id) REFERENCES marital_status (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE pet DROP FOREIGN KEY FK_E4529B855A2DB2A0');
        $this->addSql('ALTER TABLE profile DROP FOREIGN KEY FK_8157AA0F5A2DB2A0');
        $this->addSql('ALTER TABLE profile DROP FOREIGN KEY FK_8157AA0FE559F9BF');
        $this->addSql('ALTER TABLE pet DROP FOREIGN KEY FK_E4529B85B5E181AE');
        $this->addSql('ALTER TABLE address DROP FOREIGN KEY FK_D4E6F81B5E181AE');
        $this->addSql('ALTER TABLE profile DROP FOREIGN KEY FK_8157AA0FB5E181AE');
        $this->addSql('ALTER TABLE pet DROP FOREIGN KEY FK_E4529B85C54C8C93');
        $this->addSql('DROP TABLE sex');
        $this->addSql('DROP TABLE marital_status');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE pet_type');
        $this->addSql('DROP TABLE pet');
        $this->addSql('DROP TABLE address');
        $this->addSql('DROP TABLE profile');
        $this->addSql('DROP TABLE rememberme_token');
    }
}
