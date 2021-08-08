<?php

namespace App\Http\Controllers;

use App\Models\OrganizationContact;
use Illuminate\Http\Request;
use Session;

class OrganizationContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validated = $request->validate([
            'organization_name' => 'required',
            'email_id' => 'required|email',
            'message' => 'required',
        ]);

        $organization_name = trim($request->get('organization_name'));
        $email_id = $request->get('email_id');
        $message = $request->get('message');
        $organization_contact = OrganizationContact::create(['organization_name' => $organization_name , 'email_id' => $email_id, 'message' => $message]);
        Session::flash('message', 'Thank you for your request, we will respond as soon as possible'); 
        Session::flash('alert-class', 'alert-success'); 
        return redirect()->back();
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrganizationContact  $organizationContact
     * @return \Illuminate\Http\Response
     */
    public function show(OrganizationContact $organizationContact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrganizationContact  $organizationContact
     * @return \Illuminate\Http\Response
     */
    public function edit(OrganizationContact $organizationContact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrganizationContact  $organizationContact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrganizationContact $organizationContact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrganizationContact  $organizationContact
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrganizationContact $organizationContact)
    {
        //
    }
}
