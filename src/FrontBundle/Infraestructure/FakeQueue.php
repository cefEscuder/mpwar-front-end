<?php
/**
 * Created by PhpStorm.
 * User: Carles
 * Date: 09/06/2017
 * Time: 17:13
 */

namespace FrontBundle\Infraestructure;


class FakeQueue
{
    public function all(){

        return [
            json_encode([
                'source' => 'twitter',
                'category' => 'health',
                'location' => 'Spain',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sit amet lobortis ligula. Suspendisse quis gravida odio. Sed dapibus scelerisque tortor in malesuada. Duis tincidunt tempus tortor, in pulvinar lacus malesuada nec. Nullam eu lorem neque',
                'created_at' => '2017-05-13',
                'author_name' => 'test',
                'language' => 'Es'
            ]),
            json_encode([
                'source' => 'forum',
                'category' => 'welfare',
                'location' => 'France',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sit amet lobortis ligula. Suspendisse quis gravida odio. Sed dapibus scelerisque tortor in malesuada. Duis tincidunt tempus tortor, in pulvinar lacus malesuada nec. Nullam eu lorem neque',
                'created_at' => '2017-05-13',
                'author_name' => 'test',
                'language' => 'Es'
            ])
        ];
    }
}