<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
class ProvinceController extends Controller
{
    // index
    public function index()
    {
        if(!Accessible::check_permission('province','l')) return redirect('nopermission');

        $data['provinces'] = DB::table('provinces')->get();
        return view("backend.provinces.index", $data);
    }
    public function create()
    {
        if(!Accessible::check_permission('province','i')) return redirect('nopermission');
        return view("backend.provinces.add");
    }
    public function  save(Request $r)
    {
        if(!Accessible::check_permission('province','i')) return redirect('nopermission');
        $data = array(
            'code' => $r->code,
            'name' => $r->name
        );
        DB::table('provinces')->insert($data);
        Session::flash('sms', "ទិន្នន័យត្រូវបានរក្សាទុក​ដោយជោគជ័យ");
        return redirect('/province/create');
    }
    public function edit($id)
    {
        if(!Accessible::check_permission('province','u')) return redirect('nopermission');
        $data['province'] = DB::table('provinces')->where('id', $id)->first();
        return view("backend.provinces.edit", $data);
    }
    public  function update(Request $r)
    {
        if(!Accessible::check_permission('province','u')) return redirect('nopermission');
        $data = array(
            'code' => $r->code,
            'name' => $r->name
        );
        DB::table('provinces')->where('id', $r->id)->update($data);
        return redirect('/province');
    }
    public function delete($id)
    {
        if(!Accessible::check_permission('province','d')) return redirect('nopermission');
        DB::table('provinces')->where('id', $id)->delete();
        Session::flash('sms', "ទិន្នន័យត្រូវបានលុបដោយជោគជ័យ");
        return redirect('/province');
    }
}
