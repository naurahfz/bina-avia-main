<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Training;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminTraining extends Controller
{
    
    public function index(){
        return view('admin.training',[
            "trainings" => Training::all(),
            "title" => "Admin Pelatihan",
            "users" => User::all(),
        ]);
    }

    public function postHandler(Request $request){
        if($request->submit=="store"){
            $res = $this->store($request);
            return redirect('/admin/training')->with($res['status'],$res['message']);
        }
        if($request->submit=="update"){
            $res = $this->update($request);
            return redirect('/admin/training')->with($res['status'],$res['message']);
        }
        if($request->submit=="destroy"){
            $res = $this->destroy($request);
            return redirect('/admin/training')->with($res['status'],$res['message']);
            // return redirect('/admin/training')->with("info","Fitur hapus sementara dinonaktifkan");
        }else{
            return redirect('/admin/training')->with("info","Submit not found");
        }
    }

    public function store(Request $request){
        
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image|file|max:1024',
        ]);

        if($request->file('image')){
            $validatedData['image'] = time().".png";
            $request->file('image')->move(public_path('assets/img/training'), $validatedData['image']);
            Training::create($validatedData);
            return ['status'=>'success','message'=>'Pelatihan berhasil ditambahkan']; 
        }
    }

    public function update(Request $request){
        $validatedData = $request->validate([
            'id' => 'required|numeric',
            'name' => 'required',
            'description' => 'required',
        ]);
        
        $training = Training::find($request->id);

        //Check if training is found
        if($training){
            
            //Check if has image
            if($request->file('image')){
                
                $validatedData = $request->validate([
                    'name' => 'required',
                    'description' => 'required',
                    'image' => 'required|image|file|max:1024',
                ]);

                // Delete old image
                $img_path = public_path().'/assets/img/training/'.$training->image;
                unlink($img_path);         // Delete image
                
                // Upload new image
                $validatedData['image'] = time().".png";
                $request->file('image')->move(public_path('assets/img/training'), $validatedData['image']);
                $training->update($validatedData);
                return ['status'=>'success','message'=>'Pelatihan berhasil diupdate']; 
            }else{
                $training->update($validatedData);
                return ['status'=>'success','message'=>'Pelatihan berhasil diupdate']; 
            }
        }else{
            return ['status'=>'error','message'=>'Pelatihan tidak ditemukan'];
        }
    }

    public function destroy(Request $request){
        
        $validatedData = $request->validate([
            'id'=>'required|numeric',
        ]);

        $training = Training::find($request->id);

        //Check if the training is found
        if($training){
            // Delete image
            $img_path = public_path().'/assets/img/training/'.$training->image;
            unlink($img_path);         // Delete image
            // Delete news
            Training::destroy($request->id);    // Delete news
            return ['status'=>'success','message'=>'Pelatihan berhasil dihapus'];
        }else{
            return ['status'=>'error','message'=>'Pelatihan tidak ditemukan'];
        }
    }
}
