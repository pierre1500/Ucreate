<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230802094946 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE component DROP FOREIGN KEY FK_49FEA157E813F933');
        $this->addSql('DROP INDEX IDX_49FEA157E813F933 ON component');
        $this->addSql('ALTER TABLE component CHANGE section_id_id section_id INT NOT NULL');
        $this->addSql('ALTER TABLE component ADD CONSTRAINT FK_49FEA157D823E37A FOREIGN KEY (section_id) REFERENCES section (id)');
        $this->addSql('CREATE INDEX IDX_49FEA157D823E37A ON component (section_id)');
        $this->addSql('ALTER TABLE project DROP FOREIGN KEY FK_2FB3D0EE4C924D98');
        $this->addSql('ALTER TABLE project DROP FOREIGN KEY FK_2FB3D0EE9D86650F');
        $this->addSql('DROP INDEX IDX_2FB3D0EE9D86650F ON project');
        $this->addSql('DROP INDEX IDX_2FB3D0EE4C924D98 ON project');
        $this->addSql('ALTER TABLE project ADD user_id INT NOT NULL, ADD template_id INT NOT NULL, DROP user_id_id, DROP template_id_id');
        $this->addSql('ALTER TABLE project ADD CONSTRAINT FK_2FB3D0EEA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE project ADD CONSTRAINT FK_2FB3D0EE5DA0FB8 FOREIGN KEY (template_id) REFERENCES template_site (id)');
        $this->addSql('CREATE INDEX IDX_2FB3D0EEA76ED395 ON project (user_id)');
        $this->addSql('CREATE INDEX IDX_2FB3D0EE5DA0FB8 ON project (template_id)');
        $this->addSql('ALTER TABLE section DROP FOREIGN KEY FK_2D737AEF4C924D98');
        $this->addSql('DROP INDEX IDX_2D737AEF4C924D98 ON section');
        $this->addSql('ALTER TABLE section CHANGE template_id_id template_id INT NOT NULL');
        $this->addSql('ALTER TABLE section ADD CONSTRAINT FK_2D737AEF5DA0FB8 FOREIGN KEY (template_id) REFERENCES template_site (id)');
        $this->addSql('CREATE INDEX IDX_2D737AEF5DA0FB8 ON section (template_id)');
        $this->addSql('ALTER TABLE user ADD role VARCHAR(255) NOT NULL, DROP roles');
        $this->addSql('ALTER TABLE messenger_messages CHANGE created_at created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE available_at available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE delivered_at delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE project DROP FOREIGN KEY FK_2FB3D0EEA76ED395');
        $this->addSql('ALTER TABLE project DROP FOREIGN KEY FK_2FB3D0EE5DA0FB8');
        $this->addSql('DROP INDEX IDX_2FB3D0EEA76ED395 ON project');
        $this->addSql('DROP INDEX IDX_2FB3D0EE5DA0FB8 ON project');
        $this->addSql('ALTER TABLE project ADD user_id_id INT NOT NULL, ADD template_id_id INT NOT NULL, DROP user_id, DROP template_id');
        $this->addSql('ALTER TABLE project ADD CONSTRAINT FK_2FB3D0EE4C924D98 FOREIGN KEY (template_id_id) REFERENCES template_site (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE project ADD CONSTRAINT FK_2FB3D0EE9D86650F FOREIGN KEY (user_id_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_2FB3D0EE9D86650F ON project (user_id_id)');
        $this->addSql('CREATE INDEX IDX_2FB3D0EE4C924D98 ON project (template_id_id)');
        $this->addSql('ALTER TABLE messenger_messages CHANGE created_at created_at DATETIME NOT NULL, CHANGE available_at available_at DATETIME NOT NULL, CHANGE delivered_at delivered_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE section DROP FOREIGN KEY FK_2D737AEF5DA0FB8');
        $this->addSql('DROP INDEX IDX_2D737AEF5DA0FB8 ON section');
        $this->addSql('ALTER TABLE section CHANGE template_id template_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE section ADD CONSTRAINT FK_2D737AEF4C924D98 FOREIGN KEY (template_id_id) REFERENCES template_site (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_2D737AEF4C924D98 ON section (template_id_id)');
        $this->addSql('ALTER TABLE user ADD roles VARCHAR(20) NOT NULL, DROP role');
        $this->addSql('ALTER TABLE component DROP FOREIGN KEY FK_49FEA157D823E37A');
        $this->addSql('DROP INDEX IDX_49FEA157D823E37A ON component');
        $this->addSql('ALTER TABLE component CHANGE section_id section_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE component ADD CONSTRAINT FK_49FEA157E813F933 FOREIGN KEY (section_id_id) REFERENCES section (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_49FEA157E813F933 ON component (section_id_id)');
    }
}
