<?php

namespace Mahmodi\CliDemo\Tests\Commands;

use Mahmodi\CliDemo\Play;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Tester\CommandTester;

class PlayTest extends TestCase
{
    public function test_play_command_successful()
    {
        $command = new Play();

        $tester = new CommandTester($command);
        $tester->setInputs([10000, 'yes', 10000, 'no']);
        $tester->execute([]);

        $tester->assertCommandIsSuccessful();
    }
}