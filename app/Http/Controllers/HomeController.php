<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organisasi; // <--- PENTING: Import Model

class HomeController extends Controller
{
    public function index()
    {
        // Mengambil semua data organisasi dari database
        $organisasi = Organisasi::all(); 

        // Mengirim data ke view 'welcome'
        return view('welcome', compact('organisasi'));
    }
}