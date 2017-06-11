<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class DepartmentController extends Controller
{
    // index action
    public function index()
    {
        $data['departments'] = DB::table('departments')->get();
        return view('backend.departments.index', $data);
    }
    // load create form
    public function create()
    {
        return view('backend.departments.create');
    }
    public function save(Request $r)
    {
        $sms="";
        $sms1="";
        $data = array(
            'code' => $r->code,
            'name' => $r->name
        );
        $i = DB::table('departments')->insert($data);
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
            $r->session()->flash('sms', $sms);
            return redirect('/department/create');
        }
        else{
            $r->session()->flash('sms1', $sms1);
            return redirect('/department/create')->withInput();
        }
    }
    // load edit form
    public function edit($id)
    {
        $data['dp'] = DB::table('departments')->where('id', $id)->first();
        return view('backend.departments.edit', $data);
    }
    public function update(Request $r)
    {
        $data = array(
            'code' => $r->code,
            'name' => $r->name
        );
        $i = DB::table('departments')->where('id', $r->department_id)->update($data);
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
            $r->session()->flash('sms', $sms);
            return redirect('/department/edit/'.$r->department_id);
        }
        else{
            $r->session()->flash('sms1', $sms1);
            return redirect('/department/edit/'.$r->department_id);
        }
    }
    // delete
    public function delete($id)
    {
        DB::table('departments')->where('id', $id)->delete();
        return redirect('/department');
    }
}
