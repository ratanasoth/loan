<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Auth;

class VillageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['provinces'] = 
            DB::table('provinces')->orderBy("name")->get();
        $data['def_province_id'] = "";
        $data['villages'] = DB::table('villages')
            ->join('provinces', 'provinces.id', '=', 'villages.province_id')
            ->join('districts', 'districts.id', '=', 'villages.district_id')
            ->join('communes', 'communes.id', '=', 'villages.commune_id')
            ->select('villages.id', 'villages.name as vil_name')
            ->addSelect('districts.name as dis_name')
            ->addSelect('provinces.name as pro_name')
            ->addSelect('communes.name as com_name')
            ->paginate(20);

        return view("backend.villages.index", $data);
    }

    public function create()
    {
        $data['provinces'] = 
            DB::table('provinces')->orderBy('name')->get();
        $data['districts'] = 
            DB::table('districts')->orderBy('name')->get();
        $data['communes'] = 
            DB::table('communes')->orderBy('name')->get();

        return view("backend.villages.add", $data);
    }

    public function save(Request $r)
    {
        $data = [
            'name' => $r->name,
            'province_id' => $r->province,
            'commune_id' => $r->commune,
            'district_id' => $r->district
        ];
        DB::table('villages')->insert($data);
        Session::flash('sms', "ទិន្នន័យត្រូវបានរក្សាទុក​ដោយជោគជ័យ");
        return redirect('/village/create');
    }

     public function edit($id)
    {
        $data['villages'] = 
            DB::table('villages')->where('id', $id)->first();
        $data['communes'] = 
            DB::table('communes')->orderBy('name')->get();
        $data['districts'] = 
            DB::table('districts')->orderBy('name')->get();
        $data['provinces'] = 
            DB::table('provinces')->orderBy('name')->get();
       return view("backend.villages.edit", $data);
    }

    public  function update(Request $r)
    {
        $data = array(
            'name' => $r->name,
            'province_id' => $r->province,
            'district_id' => $r->district,
            'commune_id' => $r->commune
        );
        DB::table('villages')->where('id', $r->id)->update($data);
        return redirect('/village');
    }

    public function delete($id)
    {
        $test = DB::table('villages')->where('id', $id)->delete();
        Session::flash('sms', "ទិន្នន័យត្រូវបានលុបដោយជោគជ័យ");
        return redirect('/village');
    }

    public function search(Request $r)
    {
        $data['provinces'] = 
            DB::table('provinces')->orderBy("name")->get();
        $data['def_province_id'] = "";
        $query = DB::table('villages')
            ->join('provinces', 'provinces.id', '=', 'villages.province_id')
            ->join('districts', 'districts.id', '=', 'villages.district_id')
            ->join('communes', 'communes.id', '=', 'villages.commune_id');
            if($r->province_id !== 'all')
            {
                if ($r->district === 'all')
                {
                    $query = $query->where('villages.province_id', $r->province_id);
                }
                else if($r->district !== 'all')
                {
                    $query = $query->where('villages.district_id', $r->district);
                }
                if($r->commune !== 'all'){
                    $query = $query->where('villages.commune_id', $r->commune);
                }
            }
            $data['villages'] = $query->select('villages.id', 'villages.name as vil_name')
                ->addSelect('districts.name as dis_name')
                ->addSelect('provinces.name as pro_name')
                ->addSelect('communes.name as com_name')
                ->paginate(20);
            $data['def_province_id'] = $r->province_id;
            $data['def_district_id'] = $r->district;
            $data['def_commune_id'] = $r->commune;
            return view("backend.villages.index", $data);
    }
}
