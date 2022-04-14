<?php

namespace App\Command;

use App\Service\Password\PasswordService;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'bath-validation',
    description: 'Add a short description for your command',
)]
class BathValidationCommand extends Command
{
    public function __construct(
        private PasswordService $passwordService
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('connection', InputArgument::OPTIONAL, 'Argument description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $connection = $input->getArgument('connection');

        if ($connection) {
            $io->note(sprintf('You passed an connection string: %s', $connection));
        }

        if ($this->passwordService
            ->batchValidation()) {
            $io->success('All the passwords has been validated.');
        } else {
            $io->error('Invalid Connection string.');
        }

        return Command::SUCCESS;
    }
}
