<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CountController extends Controller
{
    public function sumMethod(int $a = 0, int $b = 0) {
        $message = 'Sum: ' . $a . ' + ' . $b;
        $sum = $a + $b;
        return view('count.count', ['value' => $sum, 'message' => $message, 'errorMessage' => '']);
    }

    public function difMethod(int $a = 0, int $b = 0) {
        $message = 'Diference: ' . $a . ' + ' . $b;
        $dif = $a - $b;
        return view('count.count', ['value' => $dif, 'message' => $message, 'errorMessage' => '']);
    }

    public function mulMethod(int $a = 0, int $b = 0) {
        $message = 'Multiply: ' . $a . ' + ' . $b;
        $mul = $a * $b;
        return view('count.count', ['value' => $mul, 'message' => $message, 'errorMessage' => '']);
    }

    public function divMethod(int $a = 0, int $b = 0) {
        $message = 'Divide: ' . $a . ' + ' . $b;
        if ($b === 0) {
            $errorMessage = 'Division by zero';
            $div = '';
        } else {
            $errorMessage = '';
            $div = $a / $b;
        }
        return view('count.count', ['value' => $div, 'message' => $message, 'errorMessage' => $errorMessage]);
    }
} 