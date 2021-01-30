<?php
declare(strict_types=1);

namespace App\Models;

class ShiftBreak
{
    /** @var Shift */
    private $shift;

    /** @var string */
    private $startTime;

    /** @var string */
    private $endTime;

    public function __construct(Shift $shift, string $startTime, string $endTime)
    {
        $this->shift = $shift;
        $this->startTime = $startTime;
        $this->endTime = $endTime;
    }

    /**
     * @return Shift
     */
    public function getShift(): Shift
    {
        return $this->shift;
    }

    /**
     * @param Shift $shift
     */
    public function setShift(Shift $shift): void
    {
        $this->shift = $shift;
    }

    /**
     * @return string
     */
    public function getStartTime(): string
    {
        return $this->startTime;
    }

    /**
     * @param string $startTime
     */
    public function setStartTime(string $startTime): void
    {
        $this->startTime = $startTime;
    }

    /**
     * @return string
     */
    public function getEndTime(): string
    {
        return $this->endTime;
    }

    /**
     * @param string $endTime
     */
    public function setEndTime(string $endTime): void
    {
        $this->endTime = $endTime;
    }
}
