<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        $pendafataran = Pendaftaran::orderBy('id', 'DESC')->paginate(5);
        return view('frontend.home', compact('pendafataran'));
    }
}
