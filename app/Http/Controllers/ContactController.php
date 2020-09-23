<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Requests\StoreContact;
use App\Http\Requests\UpdateContact;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limit = strtolower($request->query('limit') ?? 10);
        $contacts = $limit === 'all' ? Contact::all() : Contact::paginate($limit);

        return response()->json($contacts, 206);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContact $request)
    {
        $contact = Contact::create($request->validated());

        return response()->json($contact, 201); 
    }

    /**
     * Display the specified resource.
     *
     * @param  Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        return response()->json($contact, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContact $request, Contact $contact)
    {
        $contact->update($request->validated());

        return response()->json($contact, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return response()->json(null, 204);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        return response()->json([
            'companies' => Company::where('name', 'LIKE', "%{$request->term}%")
                                ->get(),

            'contacts' => Contact::where('first_name', 'LIKE', "%{$request->term}%")
                                ->orWhere('last_name', 'LIKE', "%{$request->term}%")                    
                                ->get()
        ], 200);
    }
}
