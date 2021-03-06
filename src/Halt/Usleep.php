<?php
declare(strict_types = 1);

namespace Innmind\TimeWarp\Halt;

use Innmind\TimeWarp\{
    Halt,
    PeriodToMilliseconds,
};
use Innmind\TimeContinuum\{
    Clock,
    Period,
};

final class Usleep implements Halt
{
    private PeriodToMilliseconds $periodToMilliseconds;

    public function __construct()
    {
        $this->periodToMilliseconds = new PeriodToMilliseconds;
    }

    public function __invoke(Clock $clock, Period $period): void
    {
        \usleep(
            ($this->periodToMilliseconds)($period) * 1000
        );
    }
}
