<?php

namespace Tests\Feature;

use App\Models\Company;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CompanyTest extends TestCase
{
    use RefreshDatabase;
    
   /** @test */
    public function companies_can_be_created() {
        $attr = ['name' => 'test'];
        $this->postJson(route('companies.store'), $attr);
        $this->assertDatabaseHas('companies', $attr);
    }

    /** @test */
    public function companies_need_a_name() {
        $this->postJson(route('companies.store'))
            ->assertUnprocessable()
            ->assertJsonValidationErrors('name');
    }

    /** @test */
    public function companies_name_must_be_unique() {
        $this->withoutExceptionHandling();
        Company::factory()->create(['name' => 'test']);
        $this->expectException('Illuminate\Validation\ValidationException');
        $this->postJson(route('companies.store'), ['name' => 'test']);
    }

    /** @test */
    public function companies_can_be_updated() {
        $this->withoutExceptionHandling();
        $attr = ['name' => 'test'];
        $company = Company::factory()->create();
        $this->patchJson(route('companies.update', $company->id), $attr);
        $this->assertDatabaseHas('companies', $attr);
    }

    /** @test */
    public function companies_can_be_deleted() {
        $company = Company::factory()->create(['name' => 'test']);
        $this->deleteJson(route('companies.destroy', $company->id));
        $this->assertDatabaseMissing('companies', ['name' => 'test']);
    }

    /** @test */
    public function you_can_see_a_company() {
        $company = Company::factory()->create(['name' => 'test']);
        $res = $this->getJson(route('companies.show', $company->id))->json();
        $this->assertEquals('test', $res['name']);
    }

    /** @test */
    public function you_can_see_all_companies() {
        Company::factory()->create();
        $res = $this->getJson(route('companies.index'))->json();
        $this->assertCount(1, $res);
    }
}
