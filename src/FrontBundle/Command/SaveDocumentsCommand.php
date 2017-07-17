<?php


namespace FrontBundle\Command;


use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SaveDocumentsCommand extends ContainerAwareCommand
{
    protected function configure()
    {
       $this
           ->setName('app:save-documents')
           ->setDescription('saves in the repository the documents coming from the queue')
       ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln("Start saving the documents from the queue\n");
        $documentSaver = $this->getContainer()->get('document_saver');
        $documentSaver->execute();
        $output->writeln("task done.\n");
    }
}