<?php

namespace App\Command;

use App\Entity\Event;
use App\Entity\Participant;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Throwable;

#[AsCommand(
    name: 'event:add-participant',
    description: 'Adds a new participant to an event.',
)]
class EventAddParticipantCommand extends Command
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this->addArgument('event-id', InputArgument::REQUIRED, 'ID of the event')
            ->addArgument('firstname', InputArgument::REQUIRED, 'Firstname of the participant')
            ->addArgument('surname', InputArgument::REQUIRED, 'Surname of the participant')
            ->addArgument('password', InputArgument::REQUIRED, 'Password of the participant');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $eventId = $input->getArgument('event-id');
        if (filter_var($eventId, FILTER_VALIDATE_INT) === false) {
            $io->error('The event ID must be an integer.');

            return Command::INVALID;
        }

        $event = $this->entityManager->getRepository(Event::class)->find($eventId);
        if ($event === null) {
            $io->error("The event ID {$eventId} does not exist.");

            return Command::INVALID;
        }

        $firstname = $input->getArgument('firstname');
        if (strlen($firstname) > 255) {
            $io->error('The firstname cannot have more than 255 characters.');

            return Command::INVALID;
        }

        $surname = $input->getArgument('surname');
        if (strlen($surname) > 255) {
            $io->error('The surname cannot have more than 255 characters.');

            return Command::INVALID;
        }

        $password = $input->getArgument('password');
        if (strlen($password) > 255) {
            $io->error('The password cannot have more than 255 characters.');

            return Command::INVALID;
        }

        $participant = new Participant();
        $participant->setEvent($event)
            ->setFirstname($firstname)
            ->setSurname($surname)
            ->setPassword($password);

        try {
            $this->entityManager->persist($participant);
            $this->entityManager->flush($participant);
            $this->entityManager->refresh($participant);
        } catch (Throwable $exception) {
            $io->error($exception->getMessage());

            return Command::FAILURE;
        }

        $io->success("You have successfully added a new participant with ID {$participant->getId()} to event '{$event->getTitle()}'!");

        return Command::SUCCESS;
    }
}
