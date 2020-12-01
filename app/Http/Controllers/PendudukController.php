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
use App\Models\Kk;
use App\Models\Penduduk;
use App\Models\Agama;

class PendudukController extends Controller
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
    public function index()
    {
        $data = Penduduk::all();

        return view('penduduk.index', compact('data'));
    }

    public function penduduk_create()
    {
        $kk = Kk::all();
        $agama = Agama::all();

        return view('penduduk.create', compact('kk', 'agama'));
    }

    public function penduduk_store(Request $request)
    {

        $data = new Penduduk;
        $data->penduduk = $request->penduduk;
        $data->save();

        // Flash Message / Alert
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Penduduk berhasil disimpan');

        return redirect('penduduk');
    }

    public function checkpenduduk()
    {
        $cek = Penduduk::where('penduduk', Input::get('penduduk'))->get();
        if(count($cek) > 0)
        {
            return "false";
        }else
        {
            return "true";
        }
    }

    public function penduduk_edit($id, Request $request)
    {
        $data = Penduduk::find($id);

        return view('penduduk.edit', compact('data'));
    }

    public function penduduk_update($id, Request $request)
    {
        $check = Penduduk::where('penduduk', $request->penduduk)
        ->where('id', '!=',  $id)
        ->first();

        if($check){
            // Flash Message / Alert
            $request->session()->flash('message.level', 'error');
            $request->session()->flash('message.content', 'Penduduk sudah ada !');

            return redirect()->back();
        }

        $ubah = Penduduk::find($id);
        $ubah->penduduk = $request->penduduk;
        $ubah->update();

        // Flash Message / Alert
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Perubahan berhasil !');

        return redirect('penduduk');
    }

    public function penduduk_delete($id, Request $request)
    {

        $hapus = Penduduk::find($id);
        $hapus->delete();

        // Flash Message / Alert
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Penduduk sudah dihapus !');

        return redirect('penduduk');
    }

}
