<?php

namespace App\Http\Controllers;

use App\Models\Podaci;
use App\Models\PraceniPredmetKorupcije;
use App\Models\Tuzilastvo;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $usersCount = User::all()->count();
        $tuzilastvoCount = Tuzilastvo::all()->count();
        $podaciCount = Podaci::where('pvk',0)->count();
        $podaciVisokeKorupcije = Podaci::where('pvk',1)->count();
        $praceniPredmetiKorupcije = PraceniPredmetKorupcije::all()->count();

        return view('admin.dashboard')
            ->with('usersCount', $usersCount)
            ->with('tuzilastvoCount', $tuzilastvoCount)
            ->with('podaciCount', $podaciCount)
            ->with('podaciVisokeKorupcije', $podaciVisokeKorupcije)
            ->with('praceniPredmetiKorupcije', $praceniPredmetiKorupcije);
    }
}
