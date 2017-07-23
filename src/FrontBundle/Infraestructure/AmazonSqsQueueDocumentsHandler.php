<?php


namespace FrontBundle\Infraestructure;

use Aws\Sqs\SqsClient;
use Elastica\Document;
use FrontBundle\Domain\Service\QueueDocumentsHandler;
use FrontBundle\Domain\ValueObject\DocumentCollection;

class AmazonSqsQueueDocumentsHandler implements QueueDocumentsHandler
{
    
    private $client;
    private $queueUrl;

    public function __construct(SqsClient $client, string $queueUrl)
    {
        $this->client = $client;
        $this->queueUrl = $queueUrl;
    }

    public function getDocuments(): DocumentCollection
    {
        $collection = new DocumentCollection();

        $numberOfMessages = $this->checkNumberOfMessagesInQueue();
        if($this->isQueueEmpty($numberOfMessages)){
            return $collection;
        }

        for($i = 0; $i < $numberOfMessages; $i++){
            $messages = $this->client->receiveMessage(
                ['QueueUrl' => $this->queueUrl]
            );

            if ($this->checkIfMessageIsRetrieved($messages)) {
                return $collection;
            }

            $message = array_shift($messages['Messages']);
            $messageDecoded = json_decode($message['Body'],true);

            $collection->add(
                new Document(
                    '',
                    $messageDecoded['enrichedDocument'],
                    self::MAPPING,
                    self::INDEX
                )
            );

            $this->DeleteMessageFromQueue($message);
        }
        return $collection;
    }

    private function checkIfMessageIsRetrieved($messages): bool
    {
        return $messages['Messages'] == null;
    }

    private function DeleteMessageFromQueue($message) :void
    {
        $this->client->deleteMessage(
            [
                'QueueUrl' => $this->queueUrl,
                'ReceiptHandle' => $message['ReceiptHandle']
            ]
        );
    }

    private function checkNumberOfMessagesInQueue() :int
    {
        $result = $this->client->getQueueAttributes(array(
            'QueueUrl' => $this->queueUrl,
            'AttributeNames' => array('ApproximateNumberOfMessages'),
        ));

        $numberOfMessages = $result->get('Attributes')["ApproximateNumberOfMessages"];
        return intval($numberOfMessages);
    }

    private function isQueueEmpty($numberOfMessages): bool
    {
        return $numberOfMessages === 0;
    }
}