<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Types\Types;
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
        $eventTable->addColumn('id', Types::INTEGER)->setAutoincrement(true);
        $eventTable->addColumn('institution_id', Types::INTEGER);
        $eventTable->addColumn('title', Types::STRING)->setLength(64);
        $eventTable->addColumn('description', Types::TEXT);
        $eventTable->addColumn('code', Types::STRING)->setLength(10);
        $eventTable->addColumn('is_active', Types::BOOLEAN)->setDefault(false);
        $eventTable->addColumn('starts_at', Types::DATETIME_MUTABLE);
        $eventTable->addColumn('ends_at', Types::DATETIME_MUTABLE);
        $eventTable->addColumn('created_at', Types::DATETIME_MUTABLE)->setNotnull(false);
        $eventTable->addColumn('updated_at', Types::DATETIME_MUTABLE)->setNotnull(false);
        $eventTable->setPrimaryKey(['id']);
        $eventTable->addUniqueConstraint(['code']);

        $participantTable = $schema->createTable('participants');
        $participantTable->addColumn('id', Types::INTEGER)->setAutoincrement(true);
        $participantTable->addColumn('event_id', Types::INTEGER);
        $participantTable->addColumn('firstname', Types::STRING)->setLength(255);
        $participantTable->addColumn('surname', Types::STRING)->setLength(255);
        $participantTable->addColumn('password', Types::STRING)->setLength(255);
        $participantTable->addColumn('created_at', Types::DATETIME_MUTABLE)->setNotnull(false);
        $participantTable->addColumn('updated_at', Types::DATETIME_MUTABLE)->setNotnull(false);
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
