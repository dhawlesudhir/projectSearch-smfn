<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220810091733 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categories_resources (categories_id INT NOT NULL, resources_id INT NOT NULL, INDEX IDX_B0B59D0FA21214B7 (categories_id), INDEX IDX_B0B59D0FACFC5BFF (resources_id), PRIMARY KEY(categories_id, resources_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE categories_resources ADD CONSTRAINT FK_B0B59D0FA21214B7 FOREIGN KEY (categories_id) REFERENCES categories (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE categories_resources ADD CONSTRAINT FK_B0B59D0FACFC5BFF FOREIGN KEY (resources_id) REFERENCES resources (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE category_resource');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category_resource (id INT AUTO_INCREMENT NOT NULL, category_id INT NOT NULL, resource_id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE categories_resources DROP FOREIGN KEY FK_B0B59D0FA21214B7');
        $this->addSql('ALTER TABLE categories_resources DROP FOREIGN KEY FK_B0B59D0FACFC5BFF');
        $this->addSql('DROP TABLE categories_resources');
    }
}
