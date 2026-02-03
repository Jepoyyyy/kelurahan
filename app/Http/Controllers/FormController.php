<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
class FormController extends Controller
{
    public function pemohonstep()
    {
        $data= session('form.pemohon', []);
        return view('form.pemohon', compact('data'));
    }
    public function postpemohonstep (request $request)
    {
        $validated = $request->validate([
        'namapemohon' => 'required|string|max:255',
        'NIKpemohon' => 'required|digits:16',
        'gender' => 'required',
        'TTLpemohon' => 'required',
        'WNpemohon' => 'required',
        'Agamapemohon' => 'required',
        'Pekerjaanpemohon' => 'required',
        'Alamatpemohon' => 'required',
        'rtpemohon' => 'required',
        'letter_type' => 'required',
        'beristrike' => 'nullable',
        'namapartnersebelumnyapemohon' => 'nullable'
        ]);
     session(['form.pemohon' => $validated]);

    return redirect('/form/ayah');
    }

    public function ayahstep()
    {
        $data= session('form.ayah', []);
        return view('form.ayah', compact('data'));
    }
    public function postayahstep (request $request){

    }
}

