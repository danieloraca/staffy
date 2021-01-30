<?php

namespace App\Http\Controllers;

use App\Http\Shopworks\SingleManning;
use App\Http\Shopworks\Calculator;
use App\Models\Rota;
use App\Models\Shift;
use App\Models\ShiftBreak;
use App\Models\Shop;
use App\Models\Staff;

class MainController extends Controller
{
    public function build(): void
    {
        $test1 = $this->scenario1();
        dump($test1);

        $test2 = $this->scenario2();
        dump($test2);

        $test3 = $this->scenario3();
        dump($test3);
    }

    private function scenario1(): SingleManning
    {
        $shop = new Shop('FunHouse');
        $rota = new Rota($shop, 'weekcommencedate');

        $calculator = new Calculator($rota);

        $staff1 = new Staff($shop, 'Black', 'Widow');

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

        return $calculator->calculate($shiftBreaks);
    }

    private function scenario2(): SingleManning
    {
        $shop = new Shop('FunHouse');
        $rota = new Rota($shop, 'weekcommencedate');

        $calculator = new Calculator($rota);

        $staff1 = new Staff($shop, 'Black', 'Widow');
        $staff2 = new Staff($shop, 'Thor', '');

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

        return $calculator->calculate($shiftBreaks);
    }

    private function scenario3(): SingleManning
    {
        $shop = new Shop('FunHouse');
        $rota = new Rota($shop, 'weekcommencedate');

        $calculator = new Calculator($rota);

        $staff1 = new Staff($shop, 'Wolverine', '');
        $staff2 = new Staff($shop, 'Gamora', '');

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

        return $calculator->calculate($shiftBreaks);
    }
}
