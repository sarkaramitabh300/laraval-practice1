<?php

namespace App\Http\Controllers;

use App\Repositories\CompanyRepository;
use Illuminate\Http\Request;



class ContactController extends Controller
{



    public function __construct(protected CompanyRepository $company)
    {
    }



    public function index()
    {


        // $companies = [
        //     1 => ['name' => 'Company One', 'contains' => 3],
        //     2 => ['name' => 'Company Two', 'contains' => 5],
        // ];
        $companies = $this->company->pluck();

        $contactsA = $this->getContacts();
        return view('contacts.index', compact('contactsA', 'companies'));
    }

    public function create()
    {
        return view('contacts.create');
    }
    public function show($id)
    {
        $contacts = $this->getContacts();
        abort_if(!isset($contacts[$id]), 404);
        $contact = $contacts[$id];
        return view('contacts.show')->with('contact', $contact);
    }

    protected function getContacts()
    {
        return [
            1 => ['id' => 1, 'name' => 'Name 1', 'phone' => '1232435435'],
            2 => ['id' => 2, 'name' => 'Name 2', 'phone' => '6754643454'],
            3 => ['id' => 3, 'name' => 'Name 3', 'phone' => '8765644452'],
        ];
    }
}
