<?php
declare(strict_types=1);

namespace App\Http\Shopworks;

use App\Models\Rota;

class Calculator
{
    /** @var Rota */
    private $rota;

    /** @var  */

    public function __construct(Rota $rota)
    {
        $this->rota = $rota;
    }

    public function calculate(array $shiftBreaks): SingleManning
    {
        $workMinutes = 0;
        if (count($shiftBreaks) === 1) {
            //works alone
            $shift = $shiftBreaks[0]->getShift();

            $minutesShift = $this->getDifferenceInMinutes(
                new \DateTime($shift->getStartTime()),
                new \DateTime($shift->getEndTime()),
            );
            $minutesBreak = $this->getDifferenceInMinutes(
                new \DateTime($shiftBreaks[0]->getStartTime()),
                new \DateTime($shiftBreaks[0]->getEndTime()),
            );
            $workMinutes = $minutesShift - $minutesBreak;
        }
        if (count($shiftBreaks) === 2) {
            $shift1 = $shiftBreaks[0]->getShift();
            $shift2 = $shiftBreaks[1]->getShift();

dump('staring...');
            $endShift1 = new \DateTime($shift1->getEndTime());
            $startShift2 = new \DateTime($shift2->getStartTime());

            if ($endShift1 <= $startShift2) {
                $workMinutes = $this->getTotalTime($shiftBreaks);
            } else {
                $overlapping = $this->getDifferenceInMinutes(
                    new \DateTime($shiftBreaks[0]->getShift()->getEndTime()),
                    new \DateTime($shiftBreaks[1]->getShift()->getStartTime()),
                );

                $workMinutes = $this->getTotalTime($shiftBreaks) - $overlapping;
            }
        }

        return new SingleManning($workMinutes);
    }

    private function getTotalTime(array $shiftBreaks): int
    {
        $workMinutes = 0;
        foreach ($shiftBreaks as $shiftBreak) {
            $minutesShift = $this->getDifferenceInMinutes(
                new \DateTime($shiftBreak->getShift()->getStartTime()),
                new \DateTime($shiftBreak->getShift()->getEndTime()),
            );
            $minutesBreak = $this->getDifferenceInMinutes(
                new \DateTime($shiftBreak->getStartTime()),
                new \DateTime($shiftBreak->getEndTime()),
            );
            $workMinutes += $minutesShift - $minutesBreak;
        }

        return $workMinutes;
    }

    private function getDifferenceInMinutes(\DateTime $start, \DateTime $end): int
    {
        $difference = $start->diff($end);

        return ($difference->days * 24 * 60) +
            ($difference->h * 60) + $difference->i;
    }
}
