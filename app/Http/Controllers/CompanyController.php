<?php

namespace App\Http\Controllers;

use App\Models\Company;

class CompanyController extends Controller
{
    /**
     * Display a listing of the companies.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Company::all(), 200);
    }

    /**
     * Display a listing of the a company contacts.
     *
     * @param  Company  $company
     * @return \Illuminate\Http\Response
     */
    public function contacts(Company $company)
    {
        return response()->json($company->contacts, 200);
    }
}
