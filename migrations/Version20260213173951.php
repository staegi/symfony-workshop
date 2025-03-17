<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260213173951 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create tables for events and participants';
    }

    public function up(Schema $schema): void
    {
        $eventTable = $schema->createTable('events');
        $eventTable->addColumn('id', 'integer')->setAutoincrement(true);
        $eventTable->addColumn('institution_id', 'integer');
        $eventTable->addColumn('title', 'string')->setLength(64);
        $eventTable->addColumn('description', 'text');
        $eventTable->addColumn('code', 'string', ['length' => 10])->setLength(10);
        $eventTable->addColumn('is_active', 'boolean')->setDefault(false);
        $eventTable->addColumn('starts_at', 'datetime');
        $eventTable->addColumn('ends_at', 'datetime');
        $eventTable->addColumn('created_at', 'datetime')->setNotnull(false);
        $eventTable->addColumn('updated_at', 'datetime')->setNotnull(false);
        $eventTable->setPrimaryKey(['id']);
        $eventTable->addUniqueConstraint(['code']);

        $participantTable = $schema->createTable('participants');
        $participantTable->addColumn('id', 'integer')->setAutoincrement(true);
        $participantTable->addColumn('event_id', 'integer');
        $participantTable->addColumn('firstname', 'string')->setLength(255);
        $participantTable->addColumn('surname', 'string')->setLength(255);
        $participantTable->addColumn('password', 'string')->setLength(255);
        $participantTable->addColumn('created_at', 'datetime')->setNotnull(false);
        $participantTable->addColumn('updated_at', 'datetime')->setNotnull(false);
        $participantTable->setPrimaryKey(['id']);
        $participantTable->addUniqueConstraint(['event_id', 'firstname', 'surname']);
        $participantTable->addForeignKeyConstraint('events', ['event_id'], ['id'], ['onDelete' => 'CASCADE', 'onUpdate' => 'CASCADE']);
    }

    public function down(Schema $schema): void
    {
        $schema->dropTable("participants");
        $schema->dropTable("events");
    }
}
