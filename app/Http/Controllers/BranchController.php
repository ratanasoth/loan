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
        $i = DB::table('branches')->insert($data);
        if(Auth::user()->language=="en")
        {
            $sms = "Data has been saved successfully.";
            $sms1 = "Could not save your data.";
        }
        else{
            $sms = "ទិន្នន័យត្រូវបានរក្សាទុកដោយជោគជ័យ។";
            $sms1 = "មិនអាចរក្សាទុកទិន្នន័យបានទេ សូមត្រួតពិនិត្យឡើងវិញ!";
        }
        if($i)
        {
            $b->session()->flash('sms', $sms);
            return redirect('/branch/create');
        }
        else{
            $b->session()->flash('sms1', $sms1);
            return redirect('/branch/create')->withInput();
        }
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
        $i = DB::table('branches')->where('id', $b->id)->update($data);
        if(Auth::user()->language=="en")
        {
            $sms = "Update has been saved successfully.";
            $sms1 = "Could not save your changes.";
        }
        else{
            $sms = "ការផ្លាស់ប្តូរត្រូវបានរក្សាទុកដោយជោគជ័យ។";
            $sms1 = "មិនអាចរក្សាការផ្លាស់ប្តូរបានទេ។ សូមត្រួតពិនិត្យឡើងវិញ!";
        }
        if($i)
        {
            $b->session()->flash('sms', $sms);
            return redirect('/branch/edit/'.$b->id);
        }
        else{
            $b->session()->flash('sms1', $sms1);
            return redirect('/branch/edit/'.$b->id);
        }
        return redirect('/branch');
    }

    public function delete($id)
    {
        $i = DB::table('branches')->where('id', $id)->delete();
        if(Auth::user()->language=="en")
        {
            Session::flash('sms', 'Data have been Deleted');
        }
        else{
            Session::flash('sms', 'ទិន្នន័យត្រូវបានលុបដោយជោគជ័យ');
        }   
        return redirect('/branch');
    }
}
