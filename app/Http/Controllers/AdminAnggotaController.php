<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminAnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Anggota::with('user')->latest()->get();
        return view('admin.data-anggota.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.data-anggota.add');
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
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'pangkat' => 'required',
            'nrp' => 'required|unique:anggotas',
            'jabatan' => 'required',
            'desa' => 'required'
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->assignRole('anggota');
        $user->save();

        $anggota = new Anggota;
        $anggota->user_id = $user->id;
        $anggota->jabatan = $request->jabatan;
        $anggota->pangkat = $request->pangkat;
        $anggota->desa = $request->desa;
        $anggota->nrp = $request->nrp;
        if($request->file('foto')){
            $file= $request->file('foto');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/profile'), $filename);
            $anggota['foto']= $filename;
        }
        $anggota->save();

        notify()->success("Anggota berhasil ditambahkan.", "Success", "topRight");

        return redirect()->route('anggotas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function show(Anggota $anggota)
    {
        return view('admin.data-anggota.detail',compact('anggota'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $anggota = Anggota::with('user')->findOrFail($id);;

        return view('admin.data-anggota.edit',compact('anggota'));
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
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            // 'password' => 'required',
            'pangkat' => 'required',
            'jabatan' => 'required',
            'desa' => 'required'
        ]);

        $user = User::findOrFail($request->user_id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->assignRole('anggota');
        $user->update();

        $anggota = Anggota::findOrFail($id);
        $anggota->user_id = $user->id;
        $anggota->jabatan = $request->jabatan;
        $anggota->pangkat = $request->pangkat;
        $anggota->desa = $request->desa;
        $anggota->nrp = $request->nrp;
        if($request->file('foto')){
            $image_path = public_path("/public/profile/".$anggota->foto);
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
            $file= $request->file('foto');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/profile'), $filename);
            $anggota['foto']= $filename;
        } else{
            unset($anggota['foto']);
        }
        $anggota->update();

        notify()->success("Anggota berhasil diperbarui.", "Success", "topRight");

        return redirect()->route('anggotas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Anggota::where('user_id', $id)->delete();
        User::where('id', $id)->delete();

        notify()->warning("Anggota berhasil dihapus.", "Warning", "topRight");
        return redirect()->route('anggotas.index');
    }
}
