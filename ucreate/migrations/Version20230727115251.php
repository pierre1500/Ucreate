<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230727115251 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE component (id INT AUTO_INCREMENT NOT NULL, section_id_id INT NOT NULL, reference VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, value VARCHAR(255) NOT NULL, INDEX IDX_49FEA157E813F933 (section_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE project (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, template_id_id INT NOT NULL, domain VARCHAR(255) NOT NULL, state VARCHAR(255) NOT NULL, INDEX IDX_2FB3D0EE9D86650F (user_id_id), INDEX IDX_2FB3D0EE4C924D98 (template_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE section (id INT AUTO_INCREMENT NOT NULL, template_id_id INT NOT NULL, orderr INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_2D737AEF4C924D98 (template_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE template_site (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE component ADD CONSTRAINT FK_49FEA157E813F933 FOREIGN KEY (section_id_id) REFERENCES section (id)');
        $this->addSql('ALTER TABLE project ADD CONSTRAINT FK_2FB3D0EE9D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE project ADD CONSTRAINT FK_2FB3D0EE4C924D98 FOREIGN KEY (template_id_id) REFERENCES template_site (id)');
        $this->addSql('ALTER TABLE section ADD CONSTRAINT FK_2D737AEF4C924D98 FOREIGN KEY (template_id_id) REFERENCES template_site (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE component DROP FOREIGN KEY FK_49FEA157E813F933');
        $this->addSql('ALTER TABLE project DROP FOREIGN KEY FK_2FB3D0EE9D86650F');
        $this->addSql('ALTER TABLE project DROP FOREIGN KEY FK_2FB3D0EE4C924D98');
        $this->addSql('ALTER TABLE section DROP FOREIGN KEY FK_2D737AEF4C924D98');
        $this->addSql('DROP TABLE component');
        $this->addSql('DROP TABLE project');
        $this->addSql('DROP TABLE section');
        $this->addSql('DROP TABLE template_site');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
