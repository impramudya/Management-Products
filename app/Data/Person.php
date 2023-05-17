<?php

namespace App\Data;

class person
{
    public function __construct(
        public string $firstName,
        public string $lastName,
    ) {
    }
}
