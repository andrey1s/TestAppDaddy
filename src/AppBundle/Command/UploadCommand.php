<?php

namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class UploadCommand extends ContainerAwareCommand
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('app:upload')
            ->addArgument('csv-file', InputArgument::OPTIONAL, 'path to csv file', 'var/data/sample_installs.csv')
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->getContainer()->getParameter('kernel.cache_dir');
        $result = $this->getContainer()->get('app.calculate')->calculate($input->getArgument('csv-file'));
        foreach ($result as $item) {
            $output->writeln(sprintf('<info>%s</info>:%s:%s:%s', $item->getAppId(), $item->getTime(), $item->getCountry(), $item->getCount()));
        }
    }
}
