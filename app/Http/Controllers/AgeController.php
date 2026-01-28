<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgeController extends Controller
{
    /**
     * Hiển thị form nhập tuổi
     */
    public function input()
    {
        return view('age.input');
    }

    /**
     * Lưu tuổi vào session
     */
    public function store(Request $request)
    {
        $age = $request->input('age');
        
        // Lưu tuổi vào session
        session(['age' => $age]);
        
        return redirect()->route('age.input')->with('success', 'Tuổi đã được lưu vào session!');
    }
}

