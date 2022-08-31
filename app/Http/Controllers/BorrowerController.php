<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Borrower;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;

use App\Notifications\WelcomeEmailNotification;


class BorrowerController extends Controller




{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
       $this->middleware('auth');
    }
    
    public function index()
    {
        $borrower = Borrower::all();
        return view('borrower.index', compact('borrower'));
 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
         return view('borrower.create');
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
           $request->validate([
            'monthly_sales'=>'required',
            'monthly_expenses'=>'required',
            'other_financing'=>'required'
        ]);

        $array= [];
        for($i=0; $i<5 ; $i++)
         {
           $random = rand(1,10) ;
           array_push($array, $random);
         }  



        $borrower = new borrower([
            'monthly_sales' => $request->get('monthly_sales'),
            'monthly_expenses' => $request->get('monthly_expenses'),
            'other_financing' => $request->get('other_financing'),
            'other_financing_amount' => $request->get('other_financing_amount'),
            'legal_business_name' => $request->get('legal_business_name'),
            'business_physical_address' => $request->get('business_physical_address'),
            'business_physical_city' => $request->get('business_physical_city'),
            'business_physical_province' => $request->get('business_physical_province'),
            'business_physical_postal' => $request->get('business_physical_postal'),
            'step' => json_encode($array),
            'email' => $request->get('email'),
            'dob' => $request->get('dob')
        ]);
        $borrower->save();

        $email = $request->get('email');


        $data = ([
            'name'=> $request->get('legal_business_name'),
            'email' => $request->get('email'),
        
            ]);

            Mail::to($email)->send(new WelcomeMail($data));

        
        return redirect('/borrower')->with('success', 'borrower saved!');
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
        $borrower = Borrower::find($id);
        return view('borrower.edit', compact('borrower'));     
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
        
        $request->validate([
            'monthly_sales'=>'required',
            'monthly_expenses'=>'required',
            'other_financing'=>'required'
        ]);
        $borrower = Borrower::find($id);

        $borrower->update([
            'monthly_sales' => $request->get('monthly_sales'),
            'monthly_expenses' => $request->get('monthly_expenses'),
            'other_financing' => $request->get('other_financing'),
            'other_financing_amount' => $request->get('other_financing_amount'),
            'legal_business_name' => $request->get('legal_business_name'),
            'business_physical_address' => $request->get('business_physical_address'),
            'business_physical_city' => $request->get('business_physical_city'),
            'business_physical_province' => $request->get('business_physical_province'),
            'business_physical_postal' => $request->get('business_physical_postal'),
            'email' => $request->get('email'),
            'dob' => $request->get('dob')

        ]);

        $borrower->save();
        return redirect('/borrower')->with('success', 'borrower updated!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $borrower = Borrower::find($id);
        $borrower->delete();
        return redirect('/borrower')->with('success', 'Borrower deleted!');
    }
}
