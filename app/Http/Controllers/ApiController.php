<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Fitur;

class ApiController extends Controller
{
    public function fitur(Type $var = null)
    {
        $fitur = Fitur::orderBy('urutan')->get();
        return response()->json([
            "message" => "success",
            "data" => $fitur
        ], Response::HTTP_OK);
    }
}
