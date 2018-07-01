<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version0003_Add_Cascade_Deleting_To_FollowingsLog_Entity extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE followings_log DROP FOREIGN KEY FK_1321E152ADA40271');
        $this->addSql('ALTER TABLE followings_log ADD CONSTRAINT FK_1321E152ADA40271 FOREIGN KEY (link_id) REFERENCES link (id) ON DELETE CASCADE');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE followings_log DROP FOREIGN KEY FK_1321E152ADA40271');
        $this->addSql('ALTER TABLE followings_log ADD CONSTRAINT FK_1321E152ADA40271 FOREIGN KEY (link_id) REFERENCES link (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
    }
}
