<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Auth;

class LoanCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['loan_categories'] = DB::table('loan_categories')->get();
        $data['loan_categories'] = DB::table('loan_categories')->paginate(10);
        return view("backend.loan_categories.index", $data);
    }

    public function create()
    {
        return view("backend.loan_categories.add");
    }

    public function save(Request $r)
    {

        $data = [
            'code' => $r->code,
            'description' => $r->description,
            'khmer_description' => $r->khmer_description
        ];
        $i = DB::table('loan_categories')->insert($data);
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
            return redirect('/loancategory/create');
        }
        else{
            $r->session()->flash('sms1', $sms1);
            return redirect('/loancategory/create')->withInput();
        }
        return redirect('/loancategory/create');
    }

    public function edit($id)
    {
        $data['loan_categories'] = DB::table('loan_categories')->where('loan_categories.id', $id)->first();
        return view("backend.loan_categories.edit", $data);
    }

    public  function update(Request $r)
    {
       $data = array(
            'code' => $r->code,
            'description' => $r->description,
            'khmer_description' => $r->khmer_description
        );
        $i = DB::table('loan_categories')->where('id', $r->id)->update($data);
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
            return redirect('/loancategory/edit/'.$r->id);
        }
        else{
            $r->session()->flash('sms1', $sms1);
            return redirect('/loancategory/edit/'.$r->id);
        }
        return redirect('/loancategory');
    }

    public function delete($id)
    {
        $i = DB::table('loan_categories')->where('id', $id)->delete();
        if(Auth::user()->language=="en")
        {
            Session::flash('sms', 'Data have been Deleted');
        }
        else{
            Session::flash('sms', 'ទិន្នន័យត្រូវបានលុបដោយជោគជ័យ');
        }   
        return redirect('/loancategory');
    }
}
