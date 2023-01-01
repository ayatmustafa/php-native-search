<?php

namespace App\Repositories;

use App\Repositories\DataAdaptorInterface;

class DummyRepository implements DataAdaptorInterface{
    public function getData($inputs)
    {
        return [
                "items"=> [
                [
                    "id"=> 302103040,
                    "node_id"=> "MDEwOlJlcG9zaXRvcnkzMDIxMDMwNDA=",
                    "name"=> "2020-01-954246-lab11-object-oriented-programming-01-yihangmeng",
                    "full_name"=> "camt-mmit/2020-01-954246-lab11-object-oriented-programming-01-yihangmeng",
                    "language"=> "PHP"
                ],
                [
                    "id"=> 309062541,
                    "node_id"=> "MDEwOlJlcG9zaXRvcnkzMDkwNjI1NDE=",
                    "name"=> "2020-01-954246-lab13-apply-to-application-01-yth888888",
                    "full_name"=> "camt-mmit/2020-01-954246-lab13-apply-to-application-01-yth888888",
                    "language"=> "PHP",
                ]
                ]
            ];
    }
}