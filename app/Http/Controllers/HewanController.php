<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hewan;

class HewanController extends Controller
{
   public function index(Request $request){
       if($request->has('search')){
        $data = Hewan::where('namapemilik','LIKE', '%' .$request->search.'%')->paginate(5);
       }else{
        $data = Hewan::paginate(5);
       }
       
       return view('datahewan', compact('data'));
   }

   public function tambahhewan(){
       return view("tambahhewan");
   }
   public function insertdata(Request $request){
    //dd($request->all());
    $data = Hewan::create($request->all());
    if($request->hasFile('foto')){
        $request->file('foto')->move('fotohewan/',$request->file('foto')->getClientOriginalName());
        $data->foto = $request ->file('foto')->getClientOriginalName();
        $data->save();
    }
    return redirect()->route("hewan")->with('Berhasil','Data berhasil diinput');
    }
    public function tampilkandata($id){
     $data = Hewan::find($id);
     //dd($data);

     return view("tampildata", compact('data'));
    }
    public function updatedata(Request $request,$id){
        $data = Hewan::find($id);
        //dd($data);
        $data->update($request->all());

        return redirect()->route("hewan")->with('Berhasil','Data berhasil diupdate');
    }
    public function delete($id){
        $data = Hewan::find($id);
        //dd($data);
        $data -> delete();
        return redirect()->route("hewan")->with('Berhasil','Data berhasil dihapus');

    }
}