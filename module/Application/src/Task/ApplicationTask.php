<?php
declare(strict_types=1);

namespace Application\Task;

use ExtendsFramework\Console\Output\OutputInterface;
use ExtendsFramework\Shell\Task\TaskInterface;

class ApplicationTask implements TaskInterface
{
    /**
     * Output.
     *
     * @var OutputInterface
     */
    private $output;

    /**
     * ApplicationTask constructor.
     *
     * @param OutputInterface $output
     */
    public function __construct(OutputInterface $output)
    {
        $this->output = $output;
    }

    /**
     * @inheritDoc
     */
    public function execute(array $data): void
    {
        $this->output->line(sprintf(
            'Hello %s, welcome to this application!',
            $data['name'] ?? 'there'
        ));
    }
}
