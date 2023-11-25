<?php

namespace Mahmodi\CliDemo;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class Play extends Command
{
    /**
     * The command name
     *
     * @var [type]
     */
    protected static $defaultName = 'play';

    /**
     * The command description
     *
     * @var [type]
     */
    protected static $defaultDescription = "Welcome to my game as CLI application demo !";

    /**
     * The command execute function
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $num1 = rand(0, 9);
        $num2 = rand(0,9);

        $multiple = $num1 * $num2;

        $io = new SymfonyStyle($input, $output);

        $userAnswer = $io->ask(sprintf("What is equal of multiple %s to %s ?", $num1, $num2));

        if($multiple == $userAnswer)
            $io->success('You won !');
        else
            $io->error('Game over !');

        if($io->confirm('Do you want repeat game ?'))
            $this->execute($input, $output);

        return Command::SUCCESS;
    }
}