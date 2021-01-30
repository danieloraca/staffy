<?php
declare(strict_types=1);

namespace App\Models;

class Shift
{
    /** @var Rota */
    private $rota;

    /** @var Staff */
    private $staff;

    /** @var string */
    private $startTime;

    /** @var string */
    private $endTime;

    public function __construct(Rota $rota, Staff $staff, string $startTime, string $endTime)
    {
        $this->rota = $rota;
        $this->staff = $staff;
        $this->startTime = $startTime;
        $this->endTime = $endTime;
    }

    /**
     * @return Rota
     */
    public function getRota(): Rota
    {
        return $this->rota;
    }

    /**
     * @param Rota $rota
     */
    public function setRota(Rota $rota): void
    {
        $this->rota = $rota;
    }

    /**
     * @return Staff
     */
    public function getStaff(): Staff
    {
        return $this->staff;
    }

    /**
     * @param Staff $staff
     */
    public function setStaff(Staff $staff): void
    {
        $this->staff = $staff;
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
