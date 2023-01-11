<?php

namespace App\Http\Controllers\API;
use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Models\mahasiswa;
use Illuminate\Http\Request;
use Exception;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = mahasiswa::all();
        if($data){
            return ApiFormatter::createapi(200,'Success',$data);
        }else{
            return ApiFormatter::createapi(400,'failed');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'username' => 'required',
                'address' => 'required',
             ]);

             $mahasiswa = mahasiswa::create([
                'username' => $request->username,
                'address' => $request->address,
             ]);

             $data = mahasiswa::where('id','=',$mahasiswa->id)->get();
             if($data){
                 return ApiFormatter::createapi(200,'Success',$data);
             }else{
                 return ApiFormatter::createapi(400,'failed');
             }


        } catch (Exception $error) {
            return ApiFormatter::createapi(400,'failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = mahasiswa::where('id','=',$id)->get();
        if($data){
            return ApiFormatter::createapi(200,'Success',$data);
        }else{
            return ApiFormatter::createapi(400,'failed');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        try {
            $request->validate([
                'username' => 'required',
                'address' => 'required',
             ]);

             $mahasiswa = mahasiswa::findOrFail($id);

             $mahasiswa->update([
                'username' => $request->username,
                'address' => $request->address,
             ]);

             $data = mahasiswa::where('id','=',$mahasiswa->id)->get();
             if($data){
                 return ApiFormatter::createapi(200,'Success',$data);
             }else{
                 return ApiFormatter::createapi(400,'failed');
             }


        } catch (Exception $error) {
            return ApiFormatter::createapi(400,'failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $mahasiswa = mahasiswa::findOrFail($id);

            $data = $mahasiswa->delete();
    
            if($data){
                return ApiFormatter::createapi(200,'Success destroy data');
            }else{
                return ApiFormatter::createapi(400,'failed');
            }
        } catch (Exception $error) {
            return ApiFormatter::createapi(400,'failed');
        }
       
    }
}
