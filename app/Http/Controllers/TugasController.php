<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tbl_tugas;

class TugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $P = tbl_tugas::where('nama_mapel', 'Produktif')->orderBy('status_pengerjaan','DESC')->orderBy('deadline_time','ASC')->get();
        $E = tbl_tugas::where('nama_mapel', 'English')->orderBy('status_pengerjaan','DESC')->orderBy('deadline_time','ASC')->get();
        

        return view('tugas.index', compact(
            'P',
            'E'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $P = new tbl_tugas;
        return view('tugas.index', compact(
            'P'
        ));

        $E = new tbl_tugas;
        return view('tugas.index', compact(
            'E'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $P = new tbl_tugas;
        // $P->nis = $request->nis;
        $P->nama_mapel = $request->nama_mapel;
        $P->nama_tugas = $request->nama_tugas;
        $P->deadline_time = $request->deadline_time;
        // $P->status_pengerjaan = $request->status_pengerjaan;
        $P->skor = $request->skor;
        $P->save();
        return redirect('tugas');


        $E = new tbl_tugas;
        // $E->nis = $request->nis;
        $E->nama_mapel = $request->nama_mapel;
        $E->nama_tugas = $request->nama_tugas;
        $E->deadline_time = $request->deadline_time;
        // $E->status_pengerjaan = $request->status_pengerjaan;
        $E->skor = $request->skor;
        $E->save();
        return redirect('tugas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $PL = tbl_tugas::find($id);

        // return view('tugas', compact(
        //     'P'
        // ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $P=tbl_tugas::find($id);
        // $PL = \DB::table('tbl_tugas')->where('id',$id)->get();
        // return view('edit', ['tbl_siswa' => $PL]);
        return view('tugas.edit', compact(
            'P'
        ));

        $E=tbl_tugas::find($id);
        // $PL = \DB::table('tbl_tugas')->where('id',$id)->get();
        // return view('edit', ['tbl_siswa' => $PL]);
        return view('tugas.edit', compact(
            'E'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $P = tbl_tugas::find($id);
        $P->skor = $request->skor;
        $P->save();

        return redirect('tugas');


        $E = tbl_tugas::find($id);
        $E->skor = $request->skor;
        $E->save();

        return redirect('tugas');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // public function status_pengerjaan($id){


    //     // $P = tbl_tugas::where('id')->first();

    //     // $status_sekarang = $P->status_pengerjaan;

    //     // if($status_sekarang == 1){
    //     //     tbl_tugas::where('id')->update([
    //     //         'status_pengerjaan'=>0
    //     //     ]);
    //     // }else{
    //     //     tbl_tugas::where('id')->update([
    //     //         'status_pengerjaan'=>1
    //     //     ]);
    //     // }
    //     // return redirect('tugas')->with(['sukses'=>'status berhasil diubah']);


    // }

    public function status_pengerjaan($id)
    {
        // $E = Siswa::find($id)->first();
        $E  = \DB::table('tbl_tugas')->where('id', $id)->first();

        $status_sekarang = $E->status_pengerjaan;

        if ($status_sekarang == 1) {
            \DB::table('tbl_tugas')->where('id', $id)->update([
                'status_pengerjaan' => 0
            ]);
        } else {
            \DB::table('tbl_tugas')->where('id', $id)->update([
                'status_pengerjaan' => 1
            ]);
        }
        \Session::flash('sukses', 'Status berhasil di ubah');

        return redirect('tugas');

        $P = \DB::table('tbl_tugas')->where('id', $id)->first();

        $status_skrg = $P->status_pengerjaan;

        if ($status_skrg == 1) {
            \DB::table('tbl_tugas')->where('id', $id)->update([
                'status_pengerjaan' => 0
            ]);
        } else {
            \DB::table('tbl_tugas')->where('id', $id)->update([
                'status_pengerjaan' => 1
            ]);
        }
        \Session::flash('sukses', 'Status berhasil di ubah');

        return redirect('tugas');
    }

    public function insertform()
    {
        return view('tugas');
    }

    public function insert(Request $request)
    {
        $tugas = $request->input('skor');
        \DB::insert('insert into tbl_tugas (skor) values(skor)', [$tugas]);
        echo "insert sukses.<br/>";
        echo '<a href="/tugas">klik disini</a> to go back.';
    }
}
