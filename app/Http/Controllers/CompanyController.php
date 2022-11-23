<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Validation\Rule;

class CompanyController extends Controller
{
    public function store() {
        $attr = request()->validate([
            'name' => ['required', Rule::unique('companies', 'name')]
        ]);
        $company = Company::create($attr);
        return $company;
    }

    public function update(Company $company) {
        $attr = request()->validate([
            'name' => ['required', Rule::unique('companies', 'name')]
        ]);
        $company->update($attr);
        return $company;
    }

    public function destroy(Company $company) {
        $company->delete();
    }

    public function show(Company $company) {
        return $company;
    }

    public function index() {
        return Company::all();
    }
}
