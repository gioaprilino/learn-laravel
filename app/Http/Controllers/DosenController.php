<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Dosen;

class DosenController extends Controller
{
    //
    public function index() {
        return 'menampilkan list dosen';
    }

    public function cekObjek() {
        $dosen = new Dosen();
        dd($dosen);
    }

    public function insert() {
        $dosen = new Dosen();
        $dosen -> nama = 'putra';
        $dosen -> nip = '3717076707050003';
        $dosen -> email = 'putra@gmail.com';
        $dosen -> nohp = '081234567890';
        $dosen -> alamat = 'jl. limau manis';
        $dosen -> save();
        dd($dosen);
    }

    public function massAssignment() {
        $dosen1 = Dosen::create(
            [
                'nama' => 'jaemin',
                'nip' => '3717076707050001',
                'email' => 'jaemin@gmail.com',
                'nohp' => '081234567890',
                'alamat' => 'jl. limau manis',
                'keahlian' => 'Web Designer',
            ]
            );
            dump($dosen1);
        $dosen1 = Dosen::create(
            [
                'nama' => 'jye',
                'nip' => '3717076707050002',
                'email' => 'jye@gmail.com',
                'nohp' => '081234567877',
                'alamat' => 'jl. limau manis',
                'keahlian'=> 'diskrit',
            ]
            );
            dump($dosen1);
    }
    public function massUpdate()
   {
       $dosen = Dosen::where('nohp', '087868945409')->first()->update(
           [
               'alamat' => "jalan jalan",
               'keahlian' => "cloud platform",
           ]
       );
       dump($dosen);
   }


   public function deleteDosen()
   {
       $dosen = Dosen::find(6);
       $dosen->delete();
       dd($dosen);
   }
   public function destroyDosen()
   {
       $dosen = Dosen::destroy(2);
       dd($dosen);
   }


   public function massDelete()
   {
       $dosen = Dosen::where('keahlian', 'web')->delete();
       dd($dosen);
   }
   public function all()
   {
       $dosen = Dosen::all();
       foreach ($dosen as $itemDosen) {
           echo $itemDosen->id . '<br>';
           echo $itemDosen->nama . '<br>';
           echo $itemDosen->nik . '<br>';
           echo $itemDosen->email . '<br>';
           echo $itemDosen->nohp . '<br>';
           echo $itemDosen->alamat;
           echo '<hr>';
           //dd ($itemDosen);
       }
   }
   public function allView()
   {
       $dosen = Dosen::all();
       return view('akademik.dosen', ['dsn' => $dosen]);
   }


   public function getWhere()
   {


       $dosen = Dosen::where('keahlian', 'matematika')
           ->orderBy('nama', 'asc')
           ->get();
       return view('akademik.dosen', ['dsn' => $dosen]);
   }
   public function testWhere()
   {


       $dosen = Dosen::where('keahlian', 'Web Programming')
           ->orderBy('nik', 'asc')
           ->get();
       return view('akademik.dosen', ['dsn' => $dosen]);
   }
   public function first()
   {


       $dosen = Dosen::where('keahlian', 'Matematika')->first();
       return view('akademik.dosen1', ['dosen' => $dosen]);
   }
   public function find()
   {


       $dosen = Dosen::find(15);
       return view('akademik.dosen1', ['dsn' => $dosen]);
   }
   public function latest()
   {


       $dosen = Dosen::latest()->get();
       return view('akademik.dosen', ['dsn' => $dosen]);
   }
   public function limit()
   {


       $dosen = Dosen::latest()->limit(2)->get();
       return view('akademik.dosen', ['dsn' => $dosen]);
   }
   public function skipTake()
   {


       $dosen = Dosen::orderBy("id")->skip(1)->take(4)->get();
       return view('akademik.dosen', ['dsn' => $dosen]);
   }

   public function softDelete(){
    Dosen::where('id','7')->delete();
    return 'Data berhasil dihapus';
}
public function withTrashed(){
    $dosen = Dosen::withTrashed()->get();
    return view('akademik.dosen', ['dsn' => $dosen]);
}
public function restore(){
    Dosen::withTrashed()->where('id','7')->restore();
    return "data berhasil di restore";
}
public function forceDelete(){
    Dosen::where('id','6')->forceDelete();
    return "data berhasil di hapus secara permanen";
}


}

