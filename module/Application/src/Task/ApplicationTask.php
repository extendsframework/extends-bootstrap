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
    protected $output;

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
        $this
            ->getOutput()
            ->line(sprintf(
                'Hello %s, welcome to this application!',
                $data['name'] ?? 'there'
            ));
    }

    /**
     * Get output.
     *
     * @return OutputInterface
     */
    protected function getOutput(): OutputInterface
    {
        return $this->output;
    }
}
