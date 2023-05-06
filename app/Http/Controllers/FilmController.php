<?php

namespace App\Http\Controllers;

use App\Charts\LogActivityChart;
use App\Charts\TicketFilmChart;
use App\Models\Film;
use App\Http\Requests\StoreFilmRequest;
use App\Http\Requests\UpdateFilmRequest;
use App\Models\Transaction;
use App\Models\User;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $films = Film::orderBy('id', 'DESC')->get();
        $i = 1;
        return view('admin.home', [
            'films' => $films,
            'i' => $i,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add_page');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFilmRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFilmRequest $request)
    {
        Film::insert([
            "judul" =>  $request->judul,
            "kategori" =>  $request->kategori,
            "jam_tayang" =>  $request->jam_tayang,
            "tgl_tayang" =>  $request->tgl_tayang,
            "tiket" =>  $request->tiket,
        ]);
        return redirect('/film');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function show(Film $film)
    {
        $films = Film::orderBy('id', 'DESC')->get();
        return view('home', compact('films'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $film = Film::find($id);
        return view('admin.edit_page', compact('film'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFilmRequest  $request
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFilmRequest $request, $id)
    {
        Film::find($id)->update([
            "judul" =>  $request->judul,
            "jam_tayang" =>  $request->jam_tayang,
            "tgl_tayang" =>  $request->tgl_tayang,
            "tiket" =>  $request->tiket,
        ]);
        return redirect('/film');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Film::find($id)->delete();
        return back();
    }

    public function order($id)
    {
        $film = Film::find($id);
        $film->tiket -= 1;
        $film->terjual += 1;
        $film->save();

        $user = User::find(auth()->id());
        Transaction::insert([
            "username" => $user->username,
            "judul" =>  $film->judul,
            "created_at" =>  now(),
            "updated_at" =>  now(),
        ]);
        return view('ticket', compact('film'));
    }

    public function report(TicketFilmChart $ticketFilmChart, LogActivityChart $logActivityChart)
    {
        $transactions = Transaction::orderBy('id', 'DESC')->get();
        $i = 1;
        return view('admin.chart', [
            'i' => $i,
            'transactions' => $transactions,
            'ticketFilmChart' => $ticketFilmChart->build(),
            'logActivityChart' => $logActivityChart->build(),
        ]);
    }

    public function word()
    {
        $transactions = Transaction::orderBy('id', 'DESC')->get();
        $i = 1;
        return view('admin.word', [
            'i' => $i,
            'transactions' => $transactions,
        ]);
    }

    public function print(TicketFilmChart $ticketFilmChart, LogActivityChart $logActivityChart)
    {
        return view('admin.print', [
            'ticketFilmChart' => $ticketFilmChart->build(),
            'logActivityChart' => $logActivityChart->build(),
        ]);
    }
}
