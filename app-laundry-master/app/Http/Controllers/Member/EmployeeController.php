<?php




namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;

use App\Models\Transaction;
use App\Models\User;
use App\Models\UserVoucher;
use App\Models\Voucher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Employee;
use PhpParser\Node\Scalar\MagicConst\Function_;

class EmployeeController extends Controller
{
    public Function index(){
        $data = Employee::all();
        return view('member.datapelanggan', compact('data'));
    }

    public Function tambahpelanggan(){
        return view('member.tambahdata');
    }

    public Function insertdata(Request $request){
        // dd($request->all());
        Employee::create($request->all());
        return view('member.insertdata');
       
        
    }

    public Function tampilkandata($id){
        $data = Employee::find($id);
        // dd($data);
        return view('member.tampildata', compact('data'));
    }

    public function updatedata(Request $request, $id){
        $data = Employee::find($id);
        $data->update($request->all());
        return redirect()->route('member.datapelanggan.index')->with('success','Data berhasil diupdate');
    }

    public function delete(Request $request, $id){
        $data = Employee::find($id);
        $data->delete();
        // return redirect()->route('pelanggan')->with('success','Data berhasil dihapus');
        return redirect()->route('member.datapelanggan.index') ->with('success', 'Data berhasil dihapus');

        // return view('member.datapelanggan', compact('user', 'vouchers', 'memberVouchers'));
    }
    
}
