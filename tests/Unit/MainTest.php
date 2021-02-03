<?php

namespace Tests\Unit;

use App\Http\Shopworks\Calculator;
use App\Http\Shopworks\SingleManning;
use App\Models\Rota;
use App\Models\Shift;
use App\Models\ShiftBreak;
use App\Models\Shop;
use App\Models\Staff;
use PHPUnit\Framework\TestCase;

class MainTest extends TestCase
{
    /** @var Shop */
    private $shop;

    public function testScenario1WhenOnlyOneStaff(): void
    {
        $this->shop = new Shop('Funhouse');

        $rota = new Rota($this->shop, 'commence_date');

        $calculator = new Calculator($rota);

        $staff1 = new Staff($this->shop, 'Black', 'Widow');

        $shift1 = new Shift(
            $rota,
            $staff1,
            '2021-01-01 09:00:00',
            '2021-01-01 17:00:00'
        );

        $shiftBreak1 = new ShiftBreak(
            $shift1,
            '2021-01-01 12:00:00',
            '2021-01-01 13:00:00'
        );
        $shiftBreaks = [$shiftBreak1];

        $response = $calculator->calculate($shiftBreaks);

        $this->assertEquals(420, $response->getMinutes());

    }

    public function testScenario2WhenTwoEmployeesDifferentTime(): void
    {
        $this->shop = new Shop('Funhouse');

        $rota = new Rota($this->shop, 'commence_date');

        $calculator = new Calculator($rota);

        $staff1 = new Staff($this->shop, 'Black', 'Widow');
        $staff2 = new Staff($this->shop, 'Thor', '');

        $shift1 = new Shift(
            $rota,
            $staff1,
            '2021-01-01 09:00:00',
            '2021-01-01 13:00:00'
        );
        $shift2 = new Shift(
            $rota,
            $staff2,
            '2021-01-01 13:00:00',
            '2021-01-01 17:00:00'
        );

        $shiftBreak1 = new ShiftBreak(
            $shift1,
            '2021-01-01 12:00:00',
            '2021-01-01 13:00:00'
        );
        $shiftBreak2 = new ShiftBreak(
            $shift2,
            '2021-01-01 15:00:00',
            '2021-01-01 16:00:00'
        );

        $shiftBreaks = [$shiftBreak1, $shiftBreak2];

        $response = $calculator->calculate($shiftBreaks);

        $this->assertEquals(360, $response->getMinutes());

    }

    public function testScenario3WhenTwoEmployeeWorkTogether(): void
    {
        $this->shop = new Shop('Funhouse');

        $rota = new Rota($this->shop, 'commence_date');

        $calculator = new Calculator($rota);

        $staff1 = new Staff($this->shop, 'Wolverine', '');
        $staff2 = new Staff($this->shop, 'Gamora', '');

        $shift1 = new Shift(
            $rota,
            $staff1,
            '2021-01-01 09:00:00',
            '2021-01-01 13:00:00'
        );
        $shift2 = new Shift(
            $rota,
            $staff2,
            '2021-01-01 09:00:00',
            '2021-01-01 12:00:00'
        );

        $shiftBreak1 = new ShiftBreak(
            $shift1,
            '2021-01-01 11:00:00',
            '2021-01-01 12:00:00'
        );
        $shiftBreak2 = new ShiftBreak(
            $shift2,
            '2021-01-01 11:00:00',
            '2021-01-01 12:00:00'
        );

        $shiftBreaks = [$shiftBreak1, $shiftBreak2];

        $response = $calculator->calculate($shiftBreaks);

        $this->assertEquals(60, $response->getMinutes());

    }

    public function testScenario4WhenTwoEmployeesWorkTogetherDifferentShiftBreak(): void
    {
        $this->shop = new Shop('Funhouse');

        $rota = new Rota($this->shop, 'commence_date');

        $calculator = new Calculator($rota);

        $staff1 = new Staff($this->shop, 'Wolverine', '');
        $staff2 = new Staff($this->shop, 'Gamora', '');

        $shift1 = new Shift(
            $rota,
            $staff1,
            '2021-01-01 09:00:00',
            '2021-01-01 13:00:00'
        );
        $shift2 = new Shift(
            $rota,
            $staff2,
            '2021-01-01 09:00:00',
            '2021-01-01 12:00:00'
        );

        $shiftBreak1 = new ShiftBreak(
            $shift1,
            '2021-01-01 11:00:00',
            '2021-01-01 12:00:00'
        );
        $shiftBreak2 = new ShiftBreak(
            $shift2,
            '2021-01-01 11:00:00',
            '2021-01-01 12:30:00'
        );

        $shiftBreaks = [$shiftBreak1, $shiftBreak2];

        $response = $calculator->calculate($shiftBreaks);

        $this->assertEquals(30, $response->getMinutes());

    }
}
