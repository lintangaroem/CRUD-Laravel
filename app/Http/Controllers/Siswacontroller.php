<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswamodel;
use Illuminate\Support\Facades\Validator;

class Siswacontroller extends Controller
{
    public function store(Request $req){
        $validator = Validator::make($req->all(),[
            'nama_siswa'=>'required',
            'tanggal_lahir'=>'required',
            'id_kelas'=>'required'
        ]);
        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        $save = Siswamodel::create([
            'nama_siswa'        =>$req->nama_siswa,
            'tanggal_lahir'     =>$req->tanggal_lahir,
            'gender'            =>$req->gender,
            'alamat'            =>$req->alamat,
            'id_kelas'          =>$req->id_kelas,
        ]);
        if($save){
            return Response()->json(['status'=>1]);
        }else{
            return Response()->json(['status'=>0]);
        }
    }

    public function getsiswakelas(){
        $getsiswa=siswaModel::join('kelas','kelas.id_kelas','siswa.id_kelas')
        ->get();
        return Response()->json(['data'=>$getsiswa]);
    }

    public function update(Request $req, $id){
        $validator = Validator::make($req->all(),[
            'nama_siswa'=>'required',
            'tanggal_lahir'=>'required',
            'id_kelas'=>'required'
        ]);
        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        $ubah=siswaModel::where('id',$id)->update([
            'nama_siswa'    =>$req->nama_siswa,
            'tanggal_lahir' =>$req->tanggal_lahir,
            'gender'        =>$req->gender,
            'alamat'        =>$req->alamat,
            'id_kelas'      =>$req->id_kelas,
        ]);
        if($ubah){
            return Response()->json(['status'=>1]);
        }else{
            return Response()->json(['status'=>0]);
        }
    }

    public function destroy($id){
        $hapus=siswaModel::where('id',$id)->delete();
        if($hapus){
            return Response()->json(['status'=>1]);
        }else{
            return Response()->json(['status'=>0]);
        }
    }
}
