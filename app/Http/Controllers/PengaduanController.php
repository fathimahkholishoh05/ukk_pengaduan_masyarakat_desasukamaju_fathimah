<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Masyarakat;
use App\Models\Tanggapan;
use carbon\Carbon;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Masyarakat.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Masyarakat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'isi_laporan' => 'required',
            // 'foto' => 'mimes:jpeg, jpg, png,'
        ]);
        
        $input = $request->all();
        $Pengaduan = new Pengaduan;

        $id = auth()->user()->id;
        $masyarakat = Masyarakat::where('id_user',$id)->first();
        $nik = $masyarakat->nik;	
        // dd($nik);
        $date = Carbon::now();

        if ($request->file('foto')) {
	        $images = $request->file('foto');
	   		$filename = $images->getClientOriginalName();
			$destination = \base_path() ."/public/images";
            $images->move($destination, $filename);     
		}else{
            $Pengaduan->nik = $nik;
            $Pengaduan->tgl_pengaduan = $date;
            $Pengaduan->isi_laporan = $input['isi_laporan'];
            $Pengaduan->foto = null;
            $Pengaduan->status = "0";

            $statusc = $Pengaduan->save();
			return redirect()->route('home'); 
		}     
        
		$Pengaduan->nik = $nik;
		$Pengaduan->tgl_pengaduan = $date;
		$Pengaduan->isi_laporan = $input['isi_laporan'];
		$Pengaduan->foto = $filename;
		$Pengaduan->status = "0";

		$statusc = $Pengaduan->save();

        if ($statusc) {            
            return redirect()->route('home')
                        ->with('success','berhasil diadukan.');
        } else {            
            dd('cek');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function show(Pengaduan $pengaduan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function edit( $id_pengaduan)
    {
        $data['pengaduan'] = Pengaduan::find($id_pengaduan);
		return view('Masyarakat.edit', compact('post')); 
	}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $ids)
    {
        $input = $request->all();
        $pengaduan = Pengaduan::find($input['id']);
        $masyarakat = Masyarakat::where('nik', $pengaduan->nik)->first();
        $nik = $masyarakat->nik;

        $date = Carbon::now();

        if ($request->File('foto')) {
	        $images = $request->file('foto');
	   		$filename = $images->getClientOriginalName();
			$destination = \base_path() ."/public/images";
	        $images->move($destination, $filename);
            
            $cek = $pengaduan->update([
                'tgl_pengaduan' => $date,
                'laporan' => $request->isi_laporan,
                'foto' => $images,
               ]);

		}else{
            $cek = $pengaduan->update([
                'tgl_pengaduan' => $date,
                'laporan' => $request->isi_laporan,
               ]);

            //    dd($cek);
            }  
            // dd($input);           
        
		// $Pengaduan->tgl_pengaduan = $date;
		// $Pengaduan->nik = $nik;
		// $Pengaduan->isi_laporan = $input['isi_laporan'];
		// $Pengaduan->foto = $filename;
		// $Pengaduan->status = "0";

		// $statusc = $Pengaduan->save();

        if ($cek) {            
            return redirect()->route('home')
                        ->with('success','berhasil diubah.');
        } else {            
            return redirect('masyarakat/home')->with('Error');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengaduan = Pengaduan::find($id);
		// File::delete('images/'.$pengaduan->foto);
		$statusc = $pengaduan->delete();

        if ($statusc) {            
            return redirect('/home')->with('success');
        } else {            
            return redirect('/home')->wirh('Error', 'gagal hapus');
        }
    }
    public function tanggapanView()
    {
        $user = Masyarakat::where('username', auth()->user()->email)->first();
        $pengaduans = Pengaduan::where('nik', $user->nik)->where('status', 'selesai')->get();
        $a = 0;
        foreach ($pengaduans as $p) {
            $tanggapan = Tanggapan::where('id_pengaduan', $p->id)->first();
            $data[$a] = [
                'tanggal' => $p->tgl_pengaduan,
                'nik' => $p->nik,
                'laporan' => $p->isi_laporan,
                'foto' => $p->foto,
                'no' => $a,
                'tanggapan' => $tanggapan->tanggapan ?? "Belum ada tanggapan",
            ];
            $a++;

        }
        
        return view('Masyarakat.tanggapan', compact('data', 'a'));
    }
}

