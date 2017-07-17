<?php


namespace FrontBundle\Infraestructure;


use Aws\Result;
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
        /** @var Result $result */
        $result = $this->client->getQueueAttributes(array(
            'QueueUrl' => $this->queueUrl,
            'AttributeNames' => array('ApproximateNumberOfMessages'),
        ));

        $numberOfMessages = $result->get('Attributes')["ApproximateNumberOfMessages"];
        $collection = new DocumentCollection();

        for($i = 0; $i < intval($numberOfMessages); $i++){
            $messages = $this->client->receiveMessage(
                [
                    'QueueUrl' => $this->queueUrl
                ]
            );

            if ($messages['Messages'] == null) {
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

            $this->client->deleteMessage(
                [
                    'QueueUrl' => $this->queueUrl,
                    'ReceiptHandle' => $message['ReceiptHandle']
                ]
            );
        }

        return $collection;
    }
}