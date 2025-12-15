<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecordingController extends Controller

{

    public function index()

    {

        return view('recording');

    }

    public function store(Request $request)

    {

        // Simpan data

        return redirect('/recording')->with('success', 'Data recorded');

    }

}