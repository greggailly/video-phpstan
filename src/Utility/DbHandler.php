<?php

namespace App\Utility;

use App\Entity\Log;
use Doctrine\ORM\EntityManagerInterface;
use Monolog\Handler\AbstractProcessingHandler;

class DbHandlers extends AbstractProcessingHandler
{
    private $manager;

    public function __construct(EntityManagerInterface $manager)
    {
        parent::__construct();
        $this->manager = $manager;
    }

    protected function write(array $context): void
    {
        $log = new Log();
        $log->setContext($context['context']);
        $log->setLevel($context['level']);
        $log->setLevelName($context['level_name']);
        $log->setMessage($context['message']);

        $this->manager->persist($log);
        $this->manager->flush();
    }
}
