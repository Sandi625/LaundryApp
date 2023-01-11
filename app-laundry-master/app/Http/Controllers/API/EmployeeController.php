<?php

namespace App\Http\Controllers\API;
use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Exception;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Employee::all();
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
                
                'nama' => 'required',
                'alamat' => 'required',
                'no_telp' => 'required',
                'servis' => 'required',
                'keterangan' => 'required',
                'kg' => 'required',
                'biaya' => 'required',
                'status' => 'required',
             ]);

             $employee = Employee::create([
                
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'no_telp' => $request->no_telp,
                'servis' => $request->servis,
                'keterangan' => $request->keterangan,
                'kg' => $request->kg,
                'biaya' => $request->biaya,
                'status' => $request->status,


             ]);

             $data = Employee::where('id','=',$employee->id)->get();
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
        $data = Employee::where('id','=',$id)->get();
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
        //
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
                'nama' => 'required',
                'alamat' => 'required',
                'no_telp' => 'required',
                'servis' => 'required',
                'keterangan' => 'required',
                'kg' => 'required',
                'biaya' => 'required',
                'status' => 'required',
             ]);

             $employee = Employee::findOrFail($id);

             $employee->update([
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'no_telp' => $request->no_telp,
                'servis' => $request->servis,
                'keterangan' => $request->keterangan,
                'kg' => $request->kg,
                'biaya' => $request->biaya,
                'status' => $request->status,
             ]);

             $data = Employee::where('id','=',$employee->id)->get();
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
            $employee = Employee::findOrFail($id);

            $data = $employee->delete();
    
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
