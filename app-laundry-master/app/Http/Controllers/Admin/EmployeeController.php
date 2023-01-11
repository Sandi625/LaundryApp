<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller

{
    public function index()
    {
        $data_pelanggan=Employee::all();
        // return $data_pelanggan;
        return view('admin.requestpelanggan', compact('data_pelanggan'));
        return redirect()->route('requestpelanggan.index')->with('success','Data berhasil diupdate');
    }
    }

