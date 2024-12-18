<?php


namespace App\Traits;

use Faker\Provider\Uuid;

trait UuidTrait
{

        private function uuid(): string
        {
                return Uuid::uuid();
        }
}
