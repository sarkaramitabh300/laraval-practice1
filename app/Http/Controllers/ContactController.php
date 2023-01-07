<?php

namespace App\Http\Controllers;

use App\Repositories\CompanyRepository;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Pagination\LengthAwarePaginator;

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
        //autoPegination
        $contactsA = Contact::latest()->where(function ($query) {
            if ($companyId = request()->query("company_id")) {
                $query->where('company_id', $companyId);
            }
        })->paginate(8);

        //manualPeginatin
        // $contactsCollection = Contact::latest()->get();
        // $perPage = 10;
        // $currentPage = request()->query('page', 1);
        // $items = $contactsCollection->slice(($currentPage * $perPage) - $perPage, $perPage); //(2*10)-10,10=(10,10)
        // $total = $contactsCollection->count();
        // // new LengthAwarePaginator();
        // $contactsA = new LengthAwarePaginator($items, $total, $perPage, $currentPage, [
        //     'path' => request()->url(),
        //     'query' => request()->query()

        // ]);
        return view('contacts.index', compact('contactsA', 'companies'));
    }

    public function create()
    {
        $companies = $this->company->pluck();
        return view('contacts.create', compact('companies'));
    }
    public function show($id)
    {
        // $contacts = Contact::find($id);
        // abort_if(empty($contact), 404);
        // $contact = Contact::find($id);
        $contact = Contact::findOrFail($id);

        return view('contacts.show')->with('contact', $contact);
    }

    // protected function getContacts()
    // {
    //     return [
    //         1 => ['id' => 1, 'name' => 'Name 1', 'phone' => '1232435435'],
    //         2 => ['id' => 2, 'name' => 'Name 2', 'phone' => '6754643454'],
    //         3 => ['id' => 3, 'name' => 'Name 3', 'phone' => '8765644452'],
    //     ];
    // }
    public function store(Request $request)
    {
        // $request->validate([
        //     'first_name' => 'required|string|max:50',
        //     'lastname_name' => 'required|string|max:50',
        //     // 'email' => 'required|email',
        //     // 'phone' => 'nullable',
        //     // 'address' => 'nullable',
        //     // 'company_id' => 'required|exists:companies,id'
        // ]);
        dd($request->all());
        return view('contacts.store');
    }
}
