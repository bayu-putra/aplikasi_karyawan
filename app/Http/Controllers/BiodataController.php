<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BiodataController extends Controller
{
    function index() : View
    {
        $biodatas = \App\Models\biodata::all();

        return view('biodata.index', ['biodatas' => $biodatas]);
    }

    function create() : View
    {
        return view('biodata.create');
    }

    function store(Request $request) : RedirectResponse
    {
        // dd($request->input());
        $validatedData = $request->validate([
            'nama' => ['required', 'min:5'],
            'tempat_lahir' => ['required', 'min:5'],
            'tanggal_lahir' => ['required', 'date'],
            'gender' => ['required', 'in:1,2'],
            'agama' => ['required', 'in:islam,katolik,kristen,hindu,budha'],
            'alamat' => ['required', 'min:5'],
            'nomer_hp' => ['required', 'min:7'],
            'email' => ['required', 'email:dns'],
            'tingkat.*' => ['required', 'in:sd,smp,sma,diploma,sarjana,master'],
            'nama_tempat.*' => ['required', 'min:5'],
            'kota.*' => ['required', 'min:5'],
            'mulai.*' => ['required','numeric' , 'between:1900,2999'],
            'selesai.*' => ['required','numeric' , 'between:1900,2999'],
            'jurusan.*' => ['required'],
            'nilai.*' => ['required', 'numeric'],
        ]);
        try {
            $biodata = new \App\Models\biodata();
            $biodata->nama = $validatedData['nama'];
            $biodata->tempat_lahir = $validatedData['tempat_lahir'];
            $biodata->tanggal_lahir = $validatedData['tanggal_lahir'];
            $biodata->gender = $validatedData['gender'];
            $biodata->agama = $validatedData['agama'];
            $biodata->alamat = $validatedData['alamat'];
            $biodata->nomer_hp = $validatedData['nomer_hp'];
            $biodata->email = $validatedData['email'];
            $biodata->save();

            foreach ($validatedData['tingkat'] as $i => $tingkat)
            {
                \App\Models\pendidikan::create([
                    'biodata_id' => $biodata->id,
                    'tingkat' => $tingkat,
                    'nama_tempat' => $validatedData['nama_tempat'][$i],
                    'kota' => $validatedData['kota'][$i],
                    'mulai' => $validatedData['mulai'][$i],
                    'selesai' => $validatedData['selesai'][$i],
                    'jurusan' => $validatedData['jurusan'][$i],
                    'nilai' => $validatedData['nilai'][$i],
                ]);
            }
        } catch (\Exception $e) {
            return redirect()->route('biodata.index')->with('error', 'Input data gagal ! : '. $e->getMessage());
        }
        return redirect()->route('biodata.index')->with('message', 'Input data berhasil !');
    }

    function show(\App\Models\biodata $biodata) : View
    {
        return view('biodata.show', ['biodata' => $biodata]);
    }

    function edit(\App\Models\biodata $biodata) : View
    {
        return view('biodata.edit', ['biodata' => $biodata]);
    }

    function update(Request $request, \App\Models\biodata $biodata) : RedirectResponse
    {
        $validatedData = $request->validate([
            'nama' => ['required', 'min:5'],
            'tempat_lahir' => ['required', 'min:5'],
            'tanggal_lahir' => ['required', 'date'],
            'gender' => ['required', 'in:1,2'],
            'agama' => ['required', 'in:islam,katolik,kristen,hindu,budha'],
            'alamat' => ['required', 'min:5'],
            'nomer_hp' => ['required', 'min:7'],
            'email' => ['required', 'email:dns'],
            'tingkat.*' => ['required', 'in:sd,smp,sma,diploma,sarjana,master'],
            'nama_tempat.*' => ['required', 'min:5'],
            'kota.*' => ['required', 'min:5'],
            'mulai.*' => ['required','numeric' , 'between:1900,2999'],
            'selesai.*' => ['required','numeric' , 'between:1900,2999'],
            'jurusan.*' => ['required'],
            'nilai.*' => ['required', 'numeric'],
        ]);
        try {
            $biodata->nama = $validatedData['nama'];
            $biodata->tempat_lahir = $validatedData['tempat_lahir'];
            $biodata->tanggal_lahir = $validatedData['tanggal_lahir'];
            $biodata->gender = $validatedData['gender'];
            $biodata->agama = $validatedData['agama'];
            $biodata->alamat = $validatedData['alamat'];
            $biodata->nomer_hp = $validatedData['nomer_hp'];
            $biodata->email = $validatedData['email'];
            $biodata->save();

            foreach ($validatedData['tingkat'] as $i => $tingkat)
            {
                \App\Models\pendidikan::updateOrCreate(
                    ['id'=> $request->pendidikan_id[$i] ?? null],
                    [
                    'biodata_id' => $biodata->id,
                    'tingkat' => $tingkat,
                    'nama_tempat' => $validatedData['nama_tempat'][$i],
                    'kota' => $validatedData['kota'][$i],
                    'mulai' => $validatedData['mulai'][$i],
                    'selesai' => $validatedData['selesai'][$i],
                    'jurusan' => $validatedData['jurusan'][$i],
                    'nilai' => $validatedData['nilai'][$i],
                    ]
                );
            }
        } catch (\Exception $e) {
            return redirect()->route('biodata.index')->with('error', 'Update data gagal ! : '. $e->getMessage());
        }
        return redirect()->route('biodata.index')->with('message', 'Update data berhasil !');
    }

    function destroy(\App\Models\biodata $biodata) : RedirectResponse
    {
        $biodata->delete();

        return redirect()->route('biodata.index')->with('message', 'data berhasil dihapus');
    }
}
