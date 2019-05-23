<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.product', ['root' => 'masterdata','currentpage' => 'product']);
    }

    public function convertdate(){
        date_default_timezone_set('Asia/Jakarta');
        $date = date('dmy');
        return $date;
    }

    public function autoNumber()
    {
        
        // $q = DB::table('products')->max('code');
        $q = DB::table('products')
          ->select(\DB::raw('max(RIGHT(code, 6)) as result'))
          ->get();
        dd($q); 
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
        $messages = [
            'name.required' => 'Name field is required.',
            'description.required' => 'Description field is required.',
            'stock.required' => 'Stock field is required.',
            
        ];
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:100',
            'description' => 'required',
            'stock' => 'required|integer',
            'price' => 'required|integer',
            'category_id' => 'required'
        ],$messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)
            ->withInput();
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
