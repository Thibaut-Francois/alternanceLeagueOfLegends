<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230707093819 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE choice_synergy (id INT AUTO_INCREMENT NOT NULL, role_id INT DEFAULT NULL, lane_id INT DEFAULT NULL, synergy INT NOT NULL, INDEX IDX_2BCDCB54D60322AC (role_id), INDEX IDX_2BCDCB54A128F72F (lane_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE choice_synergy ADD CONSTRAINT FK_2BCDCB54D60322AC FOREIGN KEY (role_id) REFERENCES role (id)');
        $this->addSql('ALTER TABLE choice_synergy ADD CONSTRAINT FK_2BCDCB54A128F72F FOREIGN KEY (lane_id) REFERENCES lane (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE choice_synergy DROP FOREIGN KEY FK_2BCDCB54D60322AC');
        $this->addSql('ALTER TABLE choice_synergy DROP FOREIGN KEY FK_2BCDCB54A128F72F');
        $this->addSql('DROP TABLE choice_synergy');
    }
}
