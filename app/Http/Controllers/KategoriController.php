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
use App\Models\Kategori;

class KategoriController extends Controller
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
        $data = Kategori::all();

        return view('kategori.index', compact('data'));
    }

    public function kategori_create()
    {
        return view('kategori.create');
    }

    public function kategori_store(Request $request)
    {

        $data = new Kategori;
        $data->kategori = $request->kategori;
        $data->save();

        // Flash Message / Alert
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Kategori berhasil disimpan');

        return redirect('kategori');
    }

    public function checkkategori()
    {
        $cek = Kategori::where('kategori', Input::get('kategori'))->get();
        if(count($cek) > 0)
        {
            return "false";
        }else
        {
            return "true";
        }
    }

    public function kategori_edit($id, Request $request)
    {
        $data = Kategori::find($id);

        return view('kategori.edit', compact('data'));
    }

    public function kategori_update($id, Request $request)
    {
        $check = Kategori::where('kategori', $request->kategori)
        ->where('id', '!=',  $id)
        ->first();

        if($check){
            // Flash Message / Alert
            $request->session()->flash('message.level', 'error');
            $request->session()->flash('message.content', 'Kategori sudah ada !');

            return redirect()->back();
        }

        $ubah = Kategori::find($id);
        $ubah->kategori = $request->kategori;
        $ubah->update();

        // Flash Message / Alert
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Perubahan berhasil !');

        return redirect('kategori');
    }

    public function kategori_delete($id, Request $request)
    {

        $hapus = Kategori::find($id);
        $hapus->delete();

        // Flash Message / Alert
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Kategori sudah dihapus !');

        return redirect('kategori');
    }

}
