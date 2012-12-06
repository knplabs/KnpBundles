<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20121205115800 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");

        $this->addSql("DROP INDEX date_bundle ON score");
        $this->addSql("ALTER TABLE score ADD hash VARCHAR(32) NOT NULL");
        $this->addSql("CREATE UNIQUE INDEX date_bundle ON score (date, bundle_id, hash)");
    }

    public function down(Schema $schema)
    {
        // this down() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");

        $this->addSql("DROP INDEX date_bundle ON score");
        $this->addSql("ALTER TABLE score DROP hash");
        $this->addSql("CREATE UNIQUE INDEX date_bundle ON score (date, bundle_id)");
    }
}
