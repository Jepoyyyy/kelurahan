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
        'Tempatpemohon' => 'required',
        'Tanggalpemohon' => 'required',
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
        if(!session()->has ('form.pemohon'))
            return redirect('form/pemohon');
        $data= session('form.ayah', []);
        return view('form.ayah', compact('data'));
    }
    public function postayahstep (request $request){
         $validated = $request->validate([
        'namaayah' => 'required|string|max:255',
        'NIKayah' => 'required|digits:16',
        'TanggalLayah' => 'required',
        'TempatLayah' => 'required',
        'WNayah' => 'required',
        'Agamaayah' => 'required',
        'Pekerjaanayah' => 'required',
        'Alamatayah' => 'required',
        'Rtayah' => 'required',
        ]);
     session(['form.ayah' => $validated]);

    return redirect('/form/ibu');
    }
    public function ibustep()
    {
        if(!session()->has ('form.pemohon'))
            return redirect('form/pemohon');
        if(!session()->has ('form.ayah'))
            return redirect('form/ayah');
        $data= session('form.ibu', []);
        return view('form.ibu', compact('data'));
    }
    public function postibustep (request $request){
         $validated = $request->validate([
        'namaibu' => 'required|string|max:255',
        'NIKibu' => 'required|digits:16',
        'TanggalLibu' => 'required',
        'TempatLibu' => 'required',
        'WNibu' => 'required',
        'Agamaibu' => 'required',
        'Pekerjaanibu' => 'required',
        'Alamatibu' => 'required',
        'Rtibu' => 'required',
        ]);
     session(['form.ibu' => $validated]);

    return redirect('/form/overview');
    }
    public function overviewstep()
    {

    }
    public function postoverviewstep (request $request){

}
}
