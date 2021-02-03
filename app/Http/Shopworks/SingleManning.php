<?php
declare(strict_types=1);

namespace App\Http\Shopworks;

class SingleManning
{
    /** @var int */
    private $minutes;

    public function __construct(int $minutes)
    {
        $this->minutes = $minutes;
    }

    public function getMinutes(): int
    {
        return $this->minutes;
    }
}
