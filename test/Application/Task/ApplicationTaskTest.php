<?php
declare(strict_types=1);

namespace Application\Task;

use ExtendsFramework\Console\Output\OutputInterface;
use PHPUnit\Framework\TestCase;

class ApplicationTaskTest extends TestCase
{
    /**
     * Execute.
     *
     * Test that execute will trigger correct output.
     *
     * @covers \Application\Task\ApplicationTask::__construct()
     * @covers \Application\Task\ApplicationTask::execute()
     */
    public function testExecute(): void
    {
        $output = $this->createMock(OutputInterface::class);
        $output
            ->expects($this->exactly(2))
            ->method('line')
            ->withConsecutive(
                ['Hello there, welcome to this application!'],
                ['Hello John, welcome to this application!']
            );

        /**
         * @var OutputInterface $output
         */
        $task = new ApplicationTask($output);
        $task->execute([]);
        $task->execute([
            'name' => 'John',
        ]);
    }
}
