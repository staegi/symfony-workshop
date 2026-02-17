<?php

namespace App\Command;

use App\Entity\Event;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'event:create',
    description: 'Creates a new event.',
)]
class EventCreateCommand extends Command
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this->addOption('active', 'a', InputOption::VALUE_NONE, 'Specifies whether the event is active')
            ->addArgument('institution-id', InputArgument::REQUIRED, 'ID of the institution')
            ->addArgument('title', InputArgument::REQUIRED, 'Title')
            ->addArgument('description', InputArgument::REQUIRED, 'Description')
            ->addArgument('code', InputArgument::REQUIRED, 'Unique code')
            ->addArgument('start-time', InputArgument::REQUIRED, 'Timestamp of the start time')
            ->addArgument('end-time', InputArgument::REQUIRED, 'Timestamp of the end time');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $institutionId = $input->getArgument('institution-id');
        if (filter_var($institutionId, FILTER_VALIDATE_INT) === false) {
            $io->error('The institution ID must be an integer.');

            return Command::INVALID;
        }

        $title = (string) $input->getArgument('title');
        if (strlen($title) > 64) {
            $io->error('The code cannot have more than 64 characters.');

            return Command::INVALID;
        }

        $code = (string) $input->getArgument('code');
        if (strlen($code) > 10) {
            $io->error('The code cannot have more than 10 characters.');

            return Command::INVALID;
        }

        try {
            $startTime = new \DateTime((string) $input->getArgument('start-time'));
        } catch (\Throwable $exception) {
            $io->error('The start time is invalid.');

            return Command::INVALID;
        }

        try {
            $endTime = new \DateTime((string) $input->getArgument('end-time'));
        } catch (\Throwable $exception) {
            $io->error('The end time is invalid.');

            return Command::INVALID;
        }

        $event = new Event();
        $event->setCode($code)
            ->setTitle($title)
            ->setInstitutionId((int) $institutionId)
            ->setDescription((string) $input->getArgument('description'))
            ->setIsActive((bool) $input->getOption('active'))
            ->setStartsAt($startTime)
            ->setEndsAt($endTime);

        try {
            $this->entityManager->persist($event);
            $this->entityManager->flush($event);
            $this->entityManager->refresh($event);
        } catch (\Throwable $exception) {
            $io->error($exception->getMessage());

            return Command::FAILURE;
        }

        $io->success("You have successfully created a new event with ID {$event->getId()}!");

        return Command::SUCCESS;
    }
}
