<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminBranch extends Controller
{
    
    public function index(){
        return view('admin.branch',[
            "branchs" => Branch::all(),
            "title" => "Admin | Kantor Cabang",
            "users" => User::all(),
        ]);
    }

    public function postHandler(Request $request){
        if($request->submit=="store"){
            $res = $this->store($request);
            return redirect('/admin/branch')->with($res['status'],$res['message']);
        }
        if($request->submit=="update"){
            $res = $this->update($request);
            return redirect('/admin/branch')->with($res['status'],$res['message']);
        }
        if($request->submit=="destroy"){
            $res = $this->destroy($request);
            return redirect('/admin/branch')->with($res['status'],$res['message']);
            // return redirect('/admin/branch')->with("info","Fitur hapus sementara dinonaktifkan");
        }else{
            return redirect('/admin/branch')->with("info","Submit not found");
        }
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'city' =>'required',
            'address' => 'required',
        ]);

        // Create new branch
        Branch::create($validatedData);
        return ['status'=>'success','message'=>'Kantor cabang berhasil ditambahkan'];
    }

    public function update(Request $request){
        $validatedData = $request->validate([
            'id' =>'required|numeric',
            'city' =>'required',
            'address' => 'required',
        ]);

        $branch = Branch::find($request->id);
        
        //Check if branch is found
        if($branch){
            // Update branch
            $branch->update($validatedData);   
            return ['status'=>'success','message'=>'Kantor cabang berhasil diedit']; 
        }else{
            return ['status'=>'error','message'=>'Kantor cabang tidak ditemukan'];
        }
    }

    public function destroy(Request $request){
        
        $validatedData = $request->validate([
            'id'=>'required|numeric',
        ]);

        $branch = Branch::find($request->id);
        $city = $branch->city;

        //Check if branch is found
        if($branch){
            Branch::destroy($request->id);    // Delete branch
            return ['status'=>'success','message'=>'Kantor cabang '.$city.' berhasil dihapus'];
        }else{
            return ['status'=>'error','message'=>'Kantor cabang tidak ditemukan'];
        }
    }
}
