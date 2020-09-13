<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(isset($request->country_id) && $request->country_id !== 0)
            $customers = \App\Customer::where('country_id', $request->country_id)->orderBy('surname')->get();
        else
            $customers = \App\Customer::orderBy('surname')->get();
        $countries = \App\Country::orderBy('title')->get();

        return view('customers.index', ['customers' => $customers, 'countries' => $countries]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $country = \App\Country::orderBy('title')->get();
        return view('customers.create',['countries' => $country]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customer = new Customer();
        $customer->fill($request->all());
        $customer->save();
    return redirect()->route('customers.index');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        $country = \App\Country::orderBy('title')->get();
        return view('customers.edit', ['customer' => $customer,'countries' => $country]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $customer->fill($request->all());
            $customer->save();
        return redirect()->route('customers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index');
    }
    public function travel($id){
        $customers = Customer::all();
        $customer = $customers->find($id);
        // dd($customer);
        return view('customers.travel', ['customer' => $customer]);
    }
}
