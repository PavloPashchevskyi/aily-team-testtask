<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version0002_Create_FollowingsLog_Entity extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE followings_log (id INT AUTO_INCREMENT NOT NULL, link_id INT DEFAULT NULL, following_date_time DATETIME NOT NULL, referer VARCHAR(255) NOT NULL, ip VARCHAR(30) NOT NULL, browser VARCHAR(255) NOT NULL, INDEX IDX_1321E152ADA40271 (link_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE followings_log ADD CONSTRAINT FK_1321E152ADA40271 FOREIGN KEY (link_id) REFERENCES link (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE followings_log');
    }
}
