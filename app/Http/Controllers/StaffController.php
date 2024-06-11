<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Role;

class StaffController extends Controller
{
    public function index(): View
    {   $roles = Role::where('name','staff')->get();
        if(Auth::user()->role->name == 'super_admin'){
            $roles = Role::all();
        }
        return view('admin.settings.staff',compact('roles'));
    }

    public function list(Request $request): JsonResponse
    { 
        $staff = User::with('role')->whereHas('role',function(Builder $builder){
            $builder = $builder -> where('name','staff');
            if(Auth::user()->role->name != 'admin'){
                $builder  ->
                orWhere('name','admin')
                -> orWhere('name','super_admin');
            }
        })->latest()->get();
        if(Auth::user()->role->name == 'staff'){
            $id_staff = Role::where('name','staff')->fisrt()->id;
            $staff = User::with('role')->where('role_id',$id_staff)->latest()->get();
        }
        if($request -> ajax()){
            return DataTables::of($staff)
            ->addColumn('role_name',function($data){
                return $data ->role-> name;
            })
            ->addColumn('tindakan',function($data){
                $button = "<button class='ubah btn btn-success m-1' id='".$data->id."'>Ubah</button>";
                $button .= "<button class='hapus btn btn-danger m-1' id='".$data->id."'>Hapus</button>";
                return $button;
            })
            ->rawColumns(['tindakan'])
            -> make(true);
        }
    }

    public function save(Request $request): JsonResponse
    {
        $user = new User();
        $user -> name = $request->name;
        $user -> username = $request->username;
        $user -> password = bcrypt($request->password);
        $user -> role_id = $request -> role_id;
        $status = $user -> save();
        if(!$status){
            return response()->json(
                ["message"=>"Data Gagal Di Simpan"]
            )->setStatusCode(400);
        }
        return response() -> json([
            "message"=>"Data Berhasil Di Simpan"
        ]) -> setStatusCode(200);
    }

    public function detail(Request $request): JsonResponse
    {
        $id = $request -> id;
        $user = User::find($id);
        return response()->json(
            ["data"=>$user]
        )->setStatusCode(200);
    }

    public function update(Request $request): JsonResponse
    {
        $id = $request -> id;
        $user = User::find($id);
        if(!empty($request->password)){
            $user -> password = $request -> password;
        }
        if($request->has('name')){
            $user -> name = $request -> name;
        }
        if($request->has('username')){
            $user -> username = $request -> username;
        }
        $status = $user -> save();
        if(!$status){
            return response()->json(
                ["message"=>"Data Gagal Di Ubah"]
            )->setStatusCode(400);
        }
        return response() -> json([
            "message"=>"Data Berhasil Di Ubah"
        ]) -> setStatusCode(200);
    }

    public function delete(Request $request): JsonResponse
    {
        $id = $request -> id;
        $user = User::find($id);
        $status = $user -> delete();
        if(!$status){
            return response()->json(
                ["message"=>"Data Gagal Di Hapus"]
            )->setStatusCode(400);
        }
        return response()->json([
            "message"=>"Data Berhasil Di Hapus"
        ]) -> setStatusCode(200);
    }

}