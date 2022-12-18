<?php

namespace Tests\Unit;

use App\Models\Career;
use App\Models\Certificate;
use App\Models\KnownForeignLanguage;
use App\Models\Language;
use App\Models\Level;
use App\Models\Profile;
use App\Models\School;
use App\Models\SchoolType;
use App\Models\Skill;
use App\Models\Technology;
use App\Models\User;
use Carbon\Carbon;
use Faker\Factory;
use Tests\TestCase;

class CertificateTest extends TestCase
{

    /**
     * A basic unit test example.
     *
     * @return void
     */

    /** @test */
    public function the_certificates_show_route_can_be_accessed()
    {
        //Arrange
        $user = User::first();


        //Act
        $response = $this->actingAs($user)
            ->withSession(['banned' => false])
            ->get('/certificates');

        //Assert
        $response->assertStatus(200);
    }

    /** @test */
    public function deny_access_to_certificate_when_user_is_not_logged()
    {
        $response = $this->withSession(['banned' => false])
            ->get('/certificates');

        $response->assertStatus(403);
    }

    /** @test */
    public function the_certificate_show_route_can_be_accessed()
    {
        //Arrange
        $user = User::first();
        $certificate = Certificate::first();

        //Act
        $response = $this->actingAs($user)
            ->withSession(['banned' => false])
            ->get('/certificates', [
                $certificate
            ]);

        //Assert
        $response->assertStatus(200);
    }


    public function test_certificate_duplication()
    {
        //Arrange
        $certifcate = Certificate::make([
            'profile_id' => 1,
            'achievement_date' => Carbon::now()->addMinutes(5)->toDate(),
            'name' => 'Certificate 1',
            'link' => 'https://google.com',
            'description' => 'test'
        ]);
        $secondcertifcate = Certificate::make([
            'profile_id' => 2,
            'achievement_date' => Carbon::now()->addMinutes(1)->toDate(),
            'name' => 'Certificate 2',
            'link' => 'https://wp.com',
            'description' => 'test description'
        ]);

        //Assert
        $this->assertTrue($certifcate->name != $secondcertifcate->name);
        $this->assertTrue($certifcate->profile_id != $secondcertifcate->profile_id);
        $this->assertTrue($certifcate->description != $secondcertifcate->description);
        $this->assertTrue($certifcate->link != $secondcertifcate->link);
        $this->assertTrue($certifcate->achievement_date != $secondcertifcate->achievement_date);
    }

    /** @test */
    public function create_certificate()
    {
        //Arrange
        $user = User::first();
        $profile = Profile::first();
        $faker = Factory::create();
        $randomName = $faker->word();

        //Act
        $response = $this->actingAs($user)
            ->withSession(['banned' => false])
            ->post('/certificates', [
                'profile_id' => $profile->id,
                'achievement_date' => Carbon::now()->addMinutes(5)->toDateString(),
                'name' => $randomName,
                'link' => 'https://1234567829.com',
                'description' => 'test'
            ]);

        //Assertion
        $response->assertStatus(302);
        $this->assertTrue(Certificate::all()
                ->where('name', '=', $randomName)
                ->where('profile_id', '=', $profile->id)->count() == 1);
    }

    /** @test */
    public function the_certificate_has_been_shown_in_index()
    {
        {
            //Arrange
            $certificate = Certificate::first();
            $user = User::first();

            $view = $this->actingAs($user)->view(
                'certificates.index',
                [
                    'certificates' => Certificate::withTrashed()->get(),
                ]);

            $view->assertSee($certificate->id);
            $view->assertSee($certificate->name);
            $view->assertSee($certificate->created_at);
            $view->assertSee($certificate->updated_at);
        }
    }

    public function test_delete_certificate()
    {
        //Arrange
        $user = User::first();
        $certificate = Certificate::all()->first();
        dump('Amount of certificates in bin before deleting ' . Certificate::onlyTrashed()->count());
        $response = $this->actingAs($user)
            ->withSession(['banned' => false])
            ->delete(route('certificates.destroy', $certificate));
        $response->assertStatus(302);
        dump('Deleting ' . $certificate->id);
        dump('Amount of certificates in bin after deleting ' . Certificate::onlyTrashed()->count());
        $this->assertSoftDeleted(Certificate::onlyTrashed()->find($certificate->id));
    }

    public function test_restore_certificate()
    {
        //Arrange
        $user = User::first();
        $certificate = Certificate::onlyTrashed()->first();
        dump('Amount of certificates in bin before restore ' . Certificate::onlyTrashed()->count());
        $response = $this->actingAs($user)
            ->withSession(['banned' => false])
            ->put(route('certificates.restore', $certificate));
        $response->assertStatus(302);
        dump('Restore ' . $certificate->id);
        dump('Amount of certificates in bin after restore ' . Certificate::onlyTrashed()->count());
        $this->assertTrue(Certificate::onlyTrashed()->find($certificate->id) == null);
    }

    /** @test */
    public function the_certificate_exits_on_owner_profile()
    {
        //Arrange
        $this->withoutMiddleware();
        $user = User::all()->where('email', '=', 'admin@local')->first();
        $certificate = Certificate::with('profile')->first();
        $profile = $certificate->profile;

        $response = $this->actingAs($user)
            ->get(route('profiles.getProfile', $certificate->profile));
        $response->assertSee($certificate->name);
        $response->assertSee($certificate->achievement_date);
        $response->assertSee($certificate->link);
        $response->assertSee($certificate->description);
        $response->assertSee($profile->first_name);
        $response->assertSee($profile->surname);
    }
}
