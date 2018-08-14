<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateCompanyRequest;
use App\Http\Requests\StoreCompanyRequest;
use App\Notifications\SimpleNotification;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Company;

class CompaniesController extends Controller
{

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
		$companies = Company::orderBy('created_at', 'DESC')->paginate(10);
		switch ($request->ws) {
			case 'getCompanies' :
				return $companies;
				break;

			default :
				return view('companies.index', compact('companies'));
				break;
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('companies.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(StoreCompanyRequest $request)
	{
		try {
			DB::beginTransaction();
			$company = Company::create($request->all());

			if ($request->has('logo')) {
				$logo = $request->file('logo')->storeAs('logo', $company->id, 'public');
				$company->update(['logo' => $company->id]);
			}

			/**
			 * Send email whenever new company is entered (use Mailgun or Mailtrap)
			 */
			$request->user()->notify(new SimpleNotification([
				'subject' => 'Se ha creado una compañia',
				'url' => route('companies.show', $company->id),
				'gretting' => 'Gracias por usar nuestra aplicación!',
			]));

			DB::commit();
			$response = $company->first_name . " successfully created!";
		} catch (\Throwable $t) {
			DB::rollback();
			return redirect()->back()->withInput($request->all())->withErrors(['error' => $t->getMessage()]);
		}

		return redirect()->route('companies.index')->withSuccess($response);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show(Company $company)
	{
		return view('companies.show', compact('company'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Company $company)
	{
		return view('companies.edit', compact('company'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(UpdateCompanyRequest $request, Company $company)
	{
		if ($request->has('logo')) {
			$logo = $request->file('logo')->storeAs('logo', $company->id, 'public');
		}

		$company->update([
			'first_name' => $request->first_name,
			'email' => $request->email,
			'website' => $request->website,
			'logo' => $company->id
		]);

		$request->user()->notify(new SimpleNotification([
			'subject' => 'Se ha actualizado una compañia',
			'url' => route('companies.edit', $company->id),
			'gretting' => 'Gracias por usar nuestra aplicación!',
		]));

		return redirect()->route('companies.index')->withSuccess($company->first_name . ' updated!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Company $company)
	{
		$message = $company->first_name . " successfully deleted!";
		$company->employees->map->delete();
		$company->delete();

		return redirect()->route('companies.index')->withSuccess($message);
	}
}
