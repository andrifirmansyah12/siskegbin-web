<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengajuanKegiatan;
use Illuminate\Support\Facades\File;
use App\Models\Anggota;
use Carbon\Carbon;

class AdminPengajuanKegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = PengajuanKegiatan::with('anggota')->latest()->get();
        return view('admin.pengajuan-kegiatan.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Anggota::with('user')->latest()->get();
        return view('admin.pengajuan-kegiatan.add',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'anggota_id' => 'required',
            'tanggal' => 'required',
            'kegiatan' => 'required',
            'deskripsi' => 'required',
            'foto' => 'required',
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'alamat' => 'required',
        ]);

        $pengajuanKegiatan = new PengajuanKegiatan;
        $pengajuanKegiatan->anggota_id = $request->anggota_id;
        $pengajuanKegiatan->tanggal = Carbon::createFromFormat('d-M-Y', $request->tanggal)->format('Y-m-d h:i:s');
        $pengajuanKegiatan->kegiatan = $request->kegiatan;
        $pengajuanKegiatan->deskripsi = $request->deskripsi;
        $pengajuanKegiatan->alamat = $request->alamat;
        $pengajuanKegiatan->kelurahan = $request->kelurahan;
        $pengajuanKegiatan->kecamatan = $request->kecamatan;
        $pengajuanKegiatan->kabupaten = $request->kabupaten;
        $pengajuanKegiatan->provinsi = $request->provinsi;
        if($request->file('foto')){
            $file= $request->file('foto');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/pengajuan-kegiatan'), $filename);
            $pengajuanKegiatan['foto']= $filename;
        }
        $pengajuanKegiatan->save();

        notify()->success("Pengajuan Kegiatan berhasil ditambahkan.", "Success", "topRight");

        return redirect()->route('pengajuan-kegiatans.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function show(PengajuanKegiatan $pengajuanKegiatan)
    {
        return view('admin.pengajuan-kegiatan.detail',compact('pengajuanKegiatan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengajuanKegiatan = PengajuanKegiatan::with('anggota')->findOrFail($id);
        $data = Anggota::with('user')->latest()->get();

        return view('admin.pengajuan-kegiatan.edit',compact('pengajuanKegiatan', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'anggota_id' => 'required',
            'tanggal' => 'required',
            'kegiatan' => 'required',
            'deskripsi' => 'required',
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'alamat' => 'required',
        ]);

        $pengajuanKegiatan = PengajuanKegiatan::findOrFail($id);
        $pengajuanKegiatan->anggota_id = $request->anggota_id;
        $pengajuanKegiatan->tanggal = Carbon::createFromFormat('d-M-Y', $request->tanggal)->format('Y-m-d h:i:s');
        $pengajuanKegiatan->kegiatan = $request->kegiatan;
        $pengajuanKegiatan->deskripsi = $request->deskripsi;
        $pengajuanKegiatan->alamat = $request->alamat;
        $pengajuanKegiatan->kelurahan = $request->kelurahan;
        $pengajuanKegiatan->kecamatan = $request->kecamatan;
        $pengajuanKegiatan->kabupaten = $request->kabupaten;
        $pengajuanKegiatan->provinsi = $request->provinsi;
        if($request->file('foto')){
            $image_path = public_path("/public/pengajuan-kegiatan/".$pengajuanKegiatan->foto);
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
            $file= $request->file('foto');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/pengajuan-kegiatan'), $filename);
            $pengajuanKegiatan['foto']= $filename;
        } else{
            unset($pengajuanKegiatan['foto']);
        }
        $pengajuanKegiatan->update();

        notify()->success("Pengajuan Kegiatan berhasil diperbarui.", "Success", "topRight");

        return redirect()->route('pengajuan-kegiatans.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PengajuanKegiatan::where('id', $id)->delete();

        notify()->warning("Pengajuan Kegiatan berhasil dihapus.", "Warning", "topRight");
        return redirect()->route('pengajuan-kegiatans.index');
    }
}
