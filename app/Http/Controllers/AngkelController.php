<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Form;
use Illuminate\Support\Facades\Redirect;
use DB;
use Hash;
use Response;
use Session;
use App\Models\Angkel;
use App\Models\Penduduk;

class AngkelController extends Controller
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
     * @return \Illuminate\Http\Response
     */

    public function index($id)
    {
        $no_kk = $id;
        $data = Angkel::with('penduduk.data_agama')->where('no_kk', $no_kk)->get();

        return view('angkel.index', compact('data', 'no_kk'));
    }

    public function individu($id)
    {
        $nik = $id;

        $data = Penduduk::with('data_agama', 'angkel.kk')->where('nik', $nik)->first();

        return view('angkel.individu', compact('data'));
    }

}
