<?php

namespace FrontBundle\Infraestructure;

class FakeQueue
{
    public function all()
    {

        return [
            json_encode([
                'source' => 'twitter',
                'keyword' => 'health',
                'category' => ['health', 'sun', 'lifestyle'],
                'location' => 'Spain',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sit amet lobortis ligula. Suspendisse quis gravida odio. Sed dapibus scelerisque tortor in malesuada. Duis tincidunt tempus tortor, in pulvinar lacus malesuada nec. Nullam eu lorem neque',
                'created_at' => '2017-05-13',
                'author_name' => 'test',
                'author_location' => 'France',
                'language' => 'es'
            ]),
            json_encode([
                'source' => 'forum',
                'keyword' => 'health',
                'category' => ['health', 'sun', 'lifestyle'],
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sit amet lobortis ligula. Suspendisse quis gravida odio. Sed dapibus scelerisque tortor in malesuada. Duis tincidunt tempus tortor, in pulvinar lacus malesuada nec. Nullam eu lorem neque',
                'created_at' => '2017-05-13',
                'author_name' => 'test',
                'author_location' => 'France',
                'language' => 'es'
            ])
        ];
    }
}