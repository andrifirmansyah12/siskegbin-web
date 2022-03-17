<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class AdminAnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Anggota::orderBy('id','DESC')->paginate(5);
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
            'pangkat' => 'required',
            'wrp' => 'required|unique:anggotas',
            'jabatan' => 'required',
            'desa' => 'required'
        ]);
    
        $input = $request->all();
    
        $user = Anggota::create($input);
    
        return redirect('data-anggota')
                        ->with('success','Anggota created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function show(Anggota $anggota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $anggota = Anggota::find($id);
    
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
            'pangkat' => 'required',
            'jabatan' => 'required',
            'desa' => 'required'
        ]);

        if ($request->wrp != $anggota = Anggota::find($id)->wrp) {
           $request['wrp'] = 'required|unique:anggotas';
        }
    
        $input = $request->all();
    
        $anggota = Anggota::find($id);
        $anggota->update($input);
    
        return redirect('data-anggota')
                        ->with('success','Anggota updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Anggota::find($id)->delete();
        return redirect('data-Anggota')
                        ->with('success','Role deleted successfully');
    }
}
