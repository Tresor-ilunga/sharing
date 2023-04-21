<?php

namespace App\Command;

use App\Entity\Link;
use App\Message\CreateLinkMessage;
use App\Repository\LinkRepository;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Messenger\MessageBusInterface;

#[AsCommand(
    name: 'app:create-link',
    description: 'Add a short description for your command',
)]
class CreateLinkCommand extends Command
{
    public function __construct(
        private readonly MessageBusInterface $bus
    )
    {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('url', InputArgument::REQUIRED, 'Argument description')
            ->addArgument('slug', InputArgument::REQUIRED, 'Argument description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $url = strval($input->getArgument('url'));
        $slug = strval($input->getArgument('slug'));

        $message = (new CreateLinkMessage($url, $slug));
        $this->bus->dispatch($message);

        $io->success('Link created !');

        return Command::SUCCESS;
    }
}
