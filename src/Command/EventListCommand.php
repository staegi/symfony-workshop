<?php

namespace App\Command;

use App\Entity\Event;
use App\Repository\EventRepository;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'event:list',
    description: 'List all events with the participant count.',
)]
class EventListCommand extends Command
{
    public function __construct(private EventRepository $eventRepository)
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $rows = array_map(function (Event $event) {
            return [
                $event->getId(),
                $event->getTitle(),
                $event->getDescription(),
                $event->getCode(),
                $event->isActive() ? 'yes' : 'no',
                $event->getStartsAt()->format('Y-m-d H:i'),
                $event->getEndsAt()->format('Y-m-d H:i'),
                $event->getCreatedAt()?->format('Y-m-d H:i'),
                $event->getUpdatedAt()?->format('Y-m-d H:i'),
                $event->getParticipants()->count(),
            ];
        }, $this->eventRepository->findAll());

        $headers = [
            'ID',
            'Title',
            'Description',
            'Code',
            'Institution ID',
            'Start time',
            'End time',
            'Creation time',
            'Update time',
            'Participant count',
        ];

        $io = new SymfonyStyle($input, $output);
        $io->title('Event list');
        $io->table($headers, $rows);

        return Command::SUCCESS;
    }
}
