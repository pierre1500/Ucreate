<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230801085429 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE section DROP FOREIGN KEY FK_2D737AEF4C924D98');
        $this->addSql('DROP INDEX IDX_2D737AEF4C924D98 ON section');
        $this->addSql('ALTER TABLE section CHANGE template_id_id template_id INT NOT NULL');
        $this->addSql('ALTER TABLE section ADD CONSTRAINT FK_2D737AEF5DA0FB8 FOREIGN KEY (template_id) REFERENCES template_site (id)');
        $this->addSql('CREATE INDEX IDX_2D737AEF5DA0FB8 ON section (template_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE section DROP FOREIGN KEY FK_2D737AEF5DA0FB8');
        $this->addSql('DROP INDEX IDX_2D737AEF5DA0FB8 ON section');
        $this->addSql('ALTER TABLE section CHANGE template_id template_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE section ADD CONSTRAINT FK_2D737AEF4C924D98 FOREIGN KEY (template_id_id) REFERENCES template_site (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_2D737AEF4C924D98 ON section (template_id_id)');
    }
}
