<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataResetController extends Controller
{
    public function reset()
    {
        DB::table('borrowings')->truncate();

        return "La table a été vider !!!";
    }
}
