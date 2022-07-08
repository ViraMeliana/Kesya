<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public const EPSILON = 1e-6;
    private static function checkZero(float $value, float $epsilon = self::EPSILON): float
    {
        return \abs($value) < $epsilon ? 0.0 : $value;
    }

    public static function pmt(float $rate, int $periods, float $present_value, float $future_value = 0.0, bool $beginning = false): float
    {
        $when = $beginning ? 1 : 0;

        if ($rate == 0) {
            return - ($future_value + $present_value) / $periods;
        }

        return - ($future_value + ($present_value * \pow(1 + $rate, $periods)))
            /
            ((1 + $rate * $when) / $rate * (\pow(1 + $rate, $periods) - 1));
    }

    public static function ipmt(float $rate, int $period, int $periods, float $present_value, float $future_value = 0.0, bool $beginning = false): float
    {
        if ($period < 1 || $period > $periods) {
            return \NAN;
        }

        if ($rate == 0) {
            return 0;
        }

        if ($beginning && $period == 1) {
            return 0.0;
        }

        $payment = self::pmt($rate, $periods, $present_value, $future_value, $beginning);
        if ($beginning) {
            $interest = (self::fv($rate, $period - 2, $payment, $present_value, $beginning) - $payment) * $rate;
        } else {
            $interest = self::fv($rate, $period - 1, $payment, $present_value, $beginning) * $rate;
        }

        return self::checkZero($interest);
    }

    public static function fv(float $rate, int $periods, float $payment, float $present_value, bool $beginning = false): float
    {
        $when = $beginning ? 1 : 0;

        if ($rate == 0) {
            $fv = -($present_value + ($payment * $periods));
            return self::checkZero($fv);
        }

        $initial  = 1 + ($rate * $when);
        $compound = \pow(1 + $rate, $periods);
        $fv       = - (($present_value * $compound) + (($payment * $initial * ($compound - 1)) / $rate));

        return self::checkZero($fv);
    }

    public static function ppmt(float $rate, int $period, int $periods, float $present_value, float $future_value = 0.0, bool $beginning = false): float
    {
        $payment = self::pmt($rate, $periods, $present_value, $future_value, $beginning);
        $ipmt    = self::ipmt($rate, $period, $periods, $present_value, $future_value, $beginning);

        return $payment - $ipmt;
    }

//    public function pmt($r, $nper, $pv, $fv)
//    {
//        $pmt = $r / (pow(1 + $r, $nper) - 1) * -($pv * pow(1 + $r, $nper) + $fv);
//
//        return $pmt;
//    }
//
//    public function fv($r, $nper, $c, $pv)
//    {
//        $fv = -($c * (pow(1 + $r, $nper) - 1) / $r + $pv
//            * pow(1 + $r, $nper));
//
//        return $fv;
//    }
//
//    public static function ipmt($r, $per, $nper, $pv, $fv) {
//        $ppmt = new Controller();
//        $ipmt = $ppmt->fv($r, $per - 1, $ppmt->pmt($r, $nper, $pv, $fv), $pv) * $r;
//
//    return $ipmt;
//    }
//
//    public static function ppmt($r, $per, $nper, $pv, $fv) {
//        $ppmt = new Controller();
//        return $ppmt->pmt($r, $nper, $pv, $fv) - $ppmt->ipmt($r, $per, $nper, $pv, $fv);
//    }
}
