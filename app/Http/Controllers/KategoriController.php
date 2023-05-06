<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function action(Film $film)
    {
        $films = Film::where('kategori','action')->orderBy('id', 'DESC')->get();
        return view('home', compact('films'));
    }
    public function horror(Film $film)
    {
        $films = Film::where('kategori','horror')->orderBy('id', 'DESC')->get();
        return view('home', compact('films'));
    }
    public function romance(Film $film)
    {
        $films = Film::where('kategori','romance')->orderBy('id', 'DESC')->get();
        return view('home', compact('films'));
    }
}
