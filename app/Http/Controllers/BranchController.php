<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Auth;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['branches'] = DB::table('companies')
            ->join('branches', 'companies.id', '=', 'branches.company_id')
            ->select('companies.name as company','branches.id','branches.code','branches.name')
            ->get();
        return view("backend.branches.index", $data);
    }

    public function create()
    {
        $data['branches'] = DB::table('branches')->orderBy('name')->get();
        $data['companies'] = DB::table('companies')->orderBy('name')->get();
        return view("backend.branches.add", $data);
    }

    public function save(Request $b)
    {
        $data = [
            'code' => $b->code,
            'name' => $b->name,
            'company_id' => $b->company,
        ];
        DB::table('branches')->insert($data);
        Session::flash('sms', "Insert Data Successfully");
        return redirect('/branch/create');
    }

    public function edit($id)
    {
        $data['branches'] = DB::table('companies')
        ->join('branches', 'companies.id', '=', 'branches.company_id')
        ->select(
                'companies.name as company',
                'branches.id',
                'branches.code',
                'branches.name', 
                'branches.company_id'
        )
        ->where('branches.id', $id)->first();
        $data['companies'] = DB::table('companies')->orderBy('name')->get();
        return view("backend.branches.edit", $data);
    }

    public  function update(Request $b)
    {
       $data = array(
            'code' => $b->code,
            'name' => $b->name,
            'company_id' => $b->company,
        );
        DB::table('branches')->where('id', $b->id)->update($data);
        return redirect('/branch');
    }

    public function delete($id)
    {
        DB::table('branches')->where('id', $id)->delete();
        Session::flash('sms', "Data have been Deleted");
        return redirect('/branch');
    }
}
