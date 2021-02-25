<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Companies;
use Illuminate\Support\Facades\Validator;
    

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $companies = Companies::all();

     return view('company.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {     
        $this->checkValidation($request);
        
        $company =  new Companies();
        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;
        if($request->file('logo')){
        $company->logo = $this->saveImage($request);
        }
        $company->save();        
       
       
   
        return redirect('/companies')->with('success', 'Company details are successfully saved');
   
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
         $company = Companies::findOrFail($id);

     return view('company.edit', compact('company'));
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
        $this->checkValidation($request);   // validation
        
        $company = [];
        $company['name'] = $request->name;
        $company['email'] = $request->email;
        $company['website'] = $request->website;

        if($request->file('logo')){
        $company['logo'] = $this->saveImage($request); // Image upload
        }
        //$company->update();        
        
        Companies::whereId($id)->update($company);

        return redirect('/companies')->with('success', 'Company details are successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $companies = Companies::findOrFail($id);
        $companies->delete();

        return redirect('/companies')->with('success', 'Company is successfully deleted');
    }

     /**
     * Upload file in public folder 
     * and reset name
     * @param HTTP request
     * 
     */
    public function saveImage($request){
    
            $file = $request->file('logo');
            $destination_path  = public_path('/logo/') ;    
            $company_logo = time().'.'.$file->getClientOriginalExtension();
            $file->move($destination_path,$company_logo);
           return $company_logo;
        
    }

     /**
     * Checking validation of given request
     * @param HTTP request
     * 
     */
    public function checkValidation($request){

     $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email:rfc,dns',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|dimensions:min_width=100,min_height=100',   
            'website' => 'nullable',
        ]);
      
        if ($validator->fails()) {
         
            return redirect('companies/create')
                        ->withErrors($validator)
                        ->withInput();
        }
    }

}
