<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Auth;

class DistrictController extends Controller
{
    public function index()
    {
        if(!Accessible::check_permission('district','l')) return redirect('nopermission');
        $data['districts'] = DB::table('districts')->paginate(12);
        $data['provinces'] = DB::table('provinces')->orderBy('name')->get();
        $data['def_province_id'] = "";
        return view("backend.districts.index", $data);
    }

    public function create()
    {
        if(!Accessible::check_permission('district','i')) return redirect('nopermission');
        $data['provinces'] = DB::table('provinces')->orderBy('name')->get();
        return view("backend.districts.add", $data);
    }

    public function save(Request $r)
    {
        if(!Accessible::check_permission('district','i')) return redirect('nopermission');
        $data = [
            'code' => $r->code,
            'name' => $r->name,
            'province_id' => $r->province,
            'province_name' => $r->province_name
        ];
        DB::table('districts')->insert($data);
        Session::flash('sms', "ទិន្នន័យត្រូវបានរក្សាទុក​ដោយជោគជ័យ");
        return redirect('/district/create?pid='.$r->province);
    }

    public function edit($id)
    {
        if(!Accessible::check_permission('district','u')) return redirect('nopermission');
        $data['districts'] = DB::table('districts')->where('id', $id)->first();
        $data['provinces'] = DB::table('provinces')->orderBy('name')->get();
       return view("backend.districts.edit", $data);
    }

    public  function update(Request $r)
    {
        if(!Accessible::check_permission('district','u')) return redirect('nopermission');
        $data = array(
            'code' => $r->code,
            'name' => $r->name,
            'province_id' => $r->province,
            'province_name' => $r->province_name
        );
        DB::table('districts')->where('id', $r->id)->update($data);
        return redirect('/district');
    }

  	public function delete($id)
    {
        if(!Accessible::check_permission('district','d')) return redirect('nopermission');
        DB::table('districts')->where('id', $id)->delete();
        Session::flash('sms', "ទិន្នន័យត្រូវបានលុបដោយជោគជ័យ");
        return redirect('/district');
    }

    // search province
    public function search(Request $r)
    {
        if(!Accessible::check_permission('district','l')) return redirect('nopermission');
        $data['provinces'] = DB::table('provinces')->orderBy('name')->get();

        $data['def_province_id'] = $r->province_id;
        $q = DB::table('districts');
            if ($r->province_id!=='all')
            {
                $q = $q->where('districts.province_id', $r->province_id);
            }
            $data['districts'] = $q->paginate(12);
        return view("backend.districts.index", $data);
    }
    // get all districts by province
    public function getDistrict($id)
    {
        $result = DB::table('districts')->where('province_id', $id)->orderBy('name')->get();
        return $result;
    }
}
