<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AdminTest extends TestCase
{

    public const INDEX = '/admin/admin';
    public const TOKEN = '_token';
    public const PASSWORD = '12345678';


    public function setUp(): void
    {
        parent::setUp();

        $this->artisan('migrate:fresh --seed');
    }

    public function login()
    {
        $user = User::factory()->create([
            'photo' => 'img/1.png',
        ]);
        $this->actingAs($user);
    }

    // ==================== READ =================================
    // unauthorize user access admin index page
    public function test_unauthorize_user_show_index()
    {
        // Do Something
        $response = $this->get(AdminTest::INDEX);

        // Assert
        $response->assertStatus(302);
    }

    // authorize user access admin index page
    public function test_authorize_user_show_index()
    {
        // Setup
        $this->login();

        // Do Something
        $response = $this->get(AdminTest::INDEX);

        // Assert
        $response->assertStatus(200);
        $response->assertSeeText('Admin / Daftar');
        $response->assertSeeText('#ID');
    }

    // make sure admin datatable give right response
    public function test_admin_datatable_response()
    {
        // Setup
        $this->login();

        // Do Something
        $response = $this->getJson(AdminTest::INDEX, ['HTTP_X-Requested-With' => 'XMLHttpRequest']);

        // Assert
        $response->assertJsonFragment(['name' => 'Yukina Sato']);
        $response->assertStatus(200);
    }

    // make sure create admin offcanvas showed up
    public function test_admin_offcanvas()
    {
        // Setup
        $this->login();

        // Do Something
        $response = $this->get(AdminTest::INDEX);

        // assert
        $response->assertStatus(200);
        $response->assertSeeText('Tambah Admin');
        $response->assertSeeText('Unggah Foto Baru');
        $response->assertSeeText('Reset');
        $response->assertSeeText('Nama Lengkap');
        $response->assertSeeText('Email');
        $response->assertSeeText('No HP');
        $response->assertSeeText('Username');
        $response->assertSeeText('Password');
        $response->assertSeeText('Konfirmasi Password');
        $response->assertSee('<button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Submit</button>', false);
    }

    public function test_show_edit_profile()
    {
        // setup
        $this->login();

        // do something
        $user = User::orderBy('id', 'desc')->first();
        $response = $this->get('/admin/profil/' . $user->id);

        // assert
        $response->assertStatus(200);
        $response->assertSeeText('Unggah Foto Baru');
        $response->assertSeeText('Reset');
        $response->assertSeeText('Nama Lengkap');
        $response->assertSeeText('Email');
        $response->assertSeeText('No HP');
        $response->assertSeeText('Username');
        $response->assertSeeText('Password Sekarang');
        $response->assertSeeText('Password Baru');
        $response->assertSeeText('Konfirmasi Password Baru');
        $response->assertSee('<button type="submit" class="btn btn-primary me-2 save-changes-edit-profile">Simpan Perubahan</button>', false);
        $response->assertSee('<button type="submit" class="btn btn-primary me-2 save-changes-password">Simpan perubahan</button>', false);
    }

    // ========================CREATE==================
    public function test_create_admin()
    {
        // setup
        Session::start();
        $this->login();

        // do something
        Storage::fake('dump');
        $photo = UploadedFile::fake()->image('profil.jpg')->size(500);
        $response = $this->post(
            AdminTest::INDEX,
            [
                'photo' => $photo,
                'email' => 'success@testing.com',
                'username' => 'success-username-testing',
                'name' => 'success-name-testing',
                'phone' => fake()->phoneNumber(),
                'password' => AdminTest::PASSWORD,
                'password_confirmation' => AdminTest::PASSWORD,
                AdminTest::TOKEN => csrf_token(),
            ],
            [
                'HTTP_X-Requested-With' => 'XMLHttpRequest'
            ]
        );

        // assert
        $response->assertStatus(200);
        $response->assertJson(['message' => 'Admin berhasil dibuat!']);
    }

    // photo req
    public function test_photo_required()
    {
        // setup
        Session::start();
        $this->login();

        // do something
        $response = $this->post(
            AdminTest::INDEX,
            [
                'photo' => null,
                'email' => 'photo-required@testing.com',
                'username' => 'photo-required-username-testing',
                'name' => 'photo-required-name-testing',
                'phone' => fake()->phoneNumber(),
                'password' => AdminTest::PASSWORD,
                'password_confirmation' => AdminTest::PASSWORD,
                AdminTest::TOKEN => csrf_token(),
            ],
            [
                'HTTP_X-Requested-With' => 'XMLHttpRequest'
            ]
        );

        // assert
        $response->assertSessionHasErrors(['photo' => 'validation.required']);
        $response->assertStatus(302);
    }

    // photo image
    public function test_photo_image()
    {
        // setup
        Session::start();
        $this->login();

        // do something
        Storage::fake('dump');
        $photo = UploadedFile::fake()->create('document.pdf');
        $response = $this->post(
            AdminTest::INDEX,
            [
                'photo' => $photo,
                'email' => 'photo-image@testing.com',
                'username' => 'photo-image-username-testing',
                'name' => 'photo-image-name-testing',
                'phone' => fake()->phoneNumber(),
                'password' => AdminTest::PASSWORD,
                'password_confirmation' => AdminTest::PASSWORD,
                AdminTest::TOKEN => csrf_token(),
            ],
            [
                'HTTP_X-Requested-With' => 'XMLHttpRequest'
            ]
        );

        // assert
        $response->assertSessionHasErrors(['photo' => 'validation.image']);
        $response->assertStatus(302);
    }

    // photo jpeg,png,jpg,gif
    public function test_photo_mimes()
    {
        // setup
        Session::start();
        $this->login();

        // do something
        Storage::fake('dump');
        $photo = UploadedFile::fake()->image('profil.webp')->size(500);
        $response = $this->post(
            AdminTest::INDEX,
            [
                'photo' => $photo,
                'email' => 'photo-mimes@testing.com',
                'username' => 'photo-mimes-username-testing',
                'name' => 'photo-mimes-name-testing',
                'phone' => fake()->phoneNumber(),
                'password' => AdminTest::PASSWORD,
                'password_confirmation' => AdminTest::PASSWORD,
                AdminTest::TOKEN => csrf_token(),
            ],
            [
                'HTTP_X-Requested-With' => 'XMLHttpRequest'
            ]
        );

        // assert
        $response->assertSessionHasErrors(['photo' => 'validation.mimes']);
        $response->assertStatus(302);
    }

    // photo max 800
    public function test_photo_max_800kb()
    {
        // setup
        Session::start();
        $this->login();

        // do something
        Storage::fake('dump');
        $photo = UploadedFile::fake()->image('profil.jpg')->size(900);
        $response = $this->post(
            AdminTest::INDEX,
            [
                'photo' => $photo,
                'email' => 'photo-max800@testing.com',
                'username' => 'photo-max800-username-testing',
                'name' => 'photo-max800-name-testing',
                'phone' => fake()->phoneNumber(),
                'password' => AdminTest::PASSWORD,
                'password_confirmation' => AdminTest::PASSWORD,
                AdminTest::TOKEN => csrf_token(),
            ],
            [
                'HTTP_X-Requested-With' => 'XMLHttpRequest'
            ]
        );

        // assert
        $response->assertSessionHasErrors(['photo' => 'validation.max.file']);
        $response->assertStatus(302);
    }

    // email req
    public function test_email_required()
    {
        // setup
        Session::start();
        $this->login();

        // do something
        Storage::fake('dump');
        $photo = UploadedFile::fake()->image('profil.jpg')->size(100);
        $response = $this->post(
            AdminTest::INDEX,
            [
                'photo' => $photo,
                'email' => null,
                'username' => 'email-username-testing',
                'name' => 'email-name-testing',
                'phone' => fake()->phoneNumber(),
                'password' => AdminTest::PASSWORD,
                'password_confirmation' => AdminTest::PASSWORD,
                AdminTest::TOKEN => csrf_token(),
            ],
            [
                'HTTP_X-Requested-With' => 'XMLHttpRequest'
            ]
        );

        // assert
        $response->assertJsonValidationErrors(['email' => 'validation.required'], 'errors');
        $response->assertJson(['status' => 400]);
    }

    // email email
    public function test_valid_email()
    {
        // setup
        Session::start();
        $this->login();

        // do something
        Storage::fake('dump');
        $photo = UploadedFile::fake()->image('profil.jpg')->size(100);
        $response = $this->post(
            AdminTest::INDEX,
            [
                'photo' => $photo,
                'email' => 'non-valid-email',
                'username' => 'non-valid-email-username-testing',
                'name' => 'non-valid-email-name-testing',
                'phone' => fake()->phoneNumber(),
                'password' => AdminTest::PASSWORD,
                'password_confirmation' => AdminTest::PASSWORD,
                AdminTest::TOKEN => csrf_token(),
            ],
            [
                'HTTP_X-Requested-With' => 'XMLHttpRequest'
            ]
        );

        // assert
        $response->assertJsonValidationErrors(['email' => 'validation.email'], 'errors');
        $response->assertJson(['status' => 400]);
    }

    // email uniq
    public function test_email_unique()
    {
        // setup
        Session::start();
        $this->login();

        // do something
        $user = User::first();

        Storage::fake('dump');
        $photo = UploadedFile::fake()->image('profil.jpg')->size(100);
        $response = $this->post(
            AdminTest::INDEX,
            [
                'photo' => $photo,
                'email' => $user->email,
                'username' => 'non-unique-email-username-testing',
                'name' => 'non-unique-email-name-testing',
                'phone' => fake()->phoneNumber(),
                'password' => AdminTest::PASSWORD,
                'password_confirmation' => AdminTest::PASSWORD,
                AdminTest::TOKEN => csrf_token(),
            ],
            [
                'HTTP_X-Requested-With' => 'XMLHttpRequest'
            ]
        );

        // assert
        $response->assertJsonValidationErrors(['email' => 'validation.unique'], 'errors');
        $response->assertJson(['status' => 400]);
    }

    // username req
    public function test_username_required()
    {
        // setup
        Session::start();
        $this->login();

        // do something
        Storage::fake('dump');
        $photo = UploadedFile::fake()->image('profil.jpg')->size(100);
        $response = $this->post(
            AdminTest::INDEX,
            [
                'photo' => $photo,
                'email' => 'username-req@testing.com',
                'username' => null,
                'name' => 'username-req-name',
                'phone' => fake()->phoneNumber(),
                'password' => AdminTest::PASSWORD,
                'password_confirmation' => AdminTest::PASSWORD,
                AdminTest::TOKEN => csrf_token(),
            ],
            [
                'HTTP_X-Requested-With' => 'XMLHttpRequest'
            ]
        );

        // assert
        $response->assertJsonValidationErrors(['username' => 'validation.required'], 'errors');
        $response->assertJson(['status' => 400]);
    }

    // username uniq
    public function test_username_unique()
    {
        // setup
        Session::start();
        $this->login();

        // do something
        $user = User::first();

        Storage::fake('dump');
        $photo = UploadedFile::fake()->image('profil.jpg')->size(100);
        $response = $this->post(
            AdminTest::INDEX,
            [
                'photo' => $photo,
                'email' => 'username-unique@testing.com',
                'username' => $user->username,
                'name' => 'username-unique-testing',
                'phone' => fake()->phoneNumber(),
                'password' => AdminTest::PASSWORD,
                'password_confirmation' => AdminTest::PASSWORD,
                AdminTest::TOKEN => csrf_token(),
            ],
            [
                'HTTP_X-Requested-With' => 'XMLHttpRequest'
            ]
        );

        // assert
        $response->assertJsonValidationErrors(['username' => 'validation.unique'], 'errors');
        $response->assertJson(['status' => 400]);
    }

    // name req
    public function test_name_required()
    {
        // setup
        Session::start();
        $this->login();

        // do something
        Storage::fake('dump');
        $photo = UploadedFile::fake()->image('profil.jpg')->size(100);
        $response = $this->post(
            AdminTest::INDEX,
            [
                'photo' => $photo,
                'email' => 'name-req@testing.com',
                'username' => 'name-req-username',
                'name' => null,
                'phone' => fake()->phoneNumber(),
                'password' => AdminTest::PASSWORD,
                'password_confirmation' => AdminTest::PASSWORD,
                AdminTest::TOKEN => csrf_token(),
            ],
            [
                'HTTP_X-Requested-With' => 'XMLHttpRequest'
            ]
        );

        // assert
        $response->assertJsonValidationErrors(['name' => 'validation.required'], 'errors');
        $response->assertJson(['status' => 400]);
    }

    // phone req
    public function test_phone_required()
    {
        // setup
        Session::start();
        $this->login();

        // do something
        Storage::fake('dump');
        $photo = UploadedFile::fake()->image('profil.jpg')->size(100);
        $response = $this->post(
            AdminTest::INDEX,
            [
                'photo' => $photo,
                'email' => 'phone-req@testing.com',
                'username' => 'phone-req-username',
                'name' => 'phone-req-name',
                'phone' => null,
                'password' => AdminTest::PASSWORD,
                'password_confirmation' => AdminTest::PASSWORD,
                AdminTest::TOKEN => csrf_token(),
            ],
            [
                'HTTP_X-Requested-With' => 'XMLHttpRequest'
            ]
        );

        // assert
        $response->assertJsonValidationErrors(['phone' => 'validation.required'], 'errors');
        $response->assertJson(['status' => 400]);
    }

    // password req
    public function test_password_required()
    {
        // setup
        Session::start();
        $this->login();

        // do something
        Storage::fake('dump');
        $photo = UploadedFile::fake()->image('profil.jpg')->size(100);
        $response = $this->post(
            AdminTest::INDEX,
            [
                'photo' => $photo,
                'email' => 'password-req@testing.com',
                'username' => 'password-req-username',
                'name' => 'password-req-name',
                'phone' => fake()->phoneNumber(),
                'password' => null,
                'password_confirmation' => AdminTest::PASSWORD,
                AdminTest::TOKEN => csrf_token(),
            ],
            [
                'HTTP_X-Requested-With' => 'XMLHttpRequest'
            ]
        );

        // assert
        $response->assertJsonValidationErrors(['password' => 'validation.required'], 'errors');
        $response->assertJson(['status' => 400]);
    }

    // password confirmed
    public function test_password_confirmed()
    {
        // setup
        Session::start();
        $this->login();

        // do something
        Storage::fake('dump');
        $photo = UploadedFile::fake()->image('profil.jpg')->size(100);
        $response = $this->post(
            AdminTest::INDEX,
            [
                'photo' => $photo,
                'email' => 'password-req@testing.com',
                'username' => 'password-req-username',
                'name' => 'password-req-name',
                'phone' => fake()->phoneNumber(),
                'password' => AdminTest::PASSWORD,
                'password_confirmation' => 'unconfirmed',
                AdminTest::TOKEN => csrf_token(),
            ],
            [
                'HTTP_X-Requested-With' => 'XMLHttpRequest'
            ]
        );

        // assert
        $response->assertJsonValidationErrors(['password' => 'validation.confirmed'], 'errors');
        $response->assertJson(['status' => 400]);
    }

    // password min:8
    public function test_password_min8()
    {
        // setup
        Session::start();
        $this->login();

        // do something
        Storage::fake('dump');
        $photo = UploadedFile::fake()->image('profil.jpg')->size(100);
        $response = $this->post(
            AdminTest::INDEX,
            [
                'photo' => $photo,
                'email' => 'password-min8@testing.com',
                'username' => 'password-min8-username',
                'name' => 'password-min8-name',
                'phone' => fake()->phoneNumber(),
                'password' => '1234567',
                'password_confirmation' => '1234567',
                AdminTest::TOKEN => csrf_token(),
            ],
            [
                'HTTP_X-Requested-With' => 'XMLHttpRequest'
            ]
        );

        // assert
        $response->assertJsonValidationErrors(['password' => 'validation.min.string'], 'errors');
        $response->assertJsonValidationErrors(['password_confirmation' => 'validation.min.string'], 'errors');
        $response->assertJson(['status' => 400]);
    }

    // password_confirmation req
    public function test_password_confirmation_req()
    {
        // setup
        Session::start();
        $this->login();

        // do something
        Storage::fake('dump');
        $photo = UploadedFile::fake()->image('profil.jpg')->size(100);
        $response = $this->post(
            AdminTest::INDEX,
            [
                'photo' => $photo,
                'email' => 'password-conf-req@testing.com',
                'username' => 'password-conf-req-username',
                'name' => 'password-conf-req-name',
                'phone' => fake()->phoneNumber(),
                'password' => '12345678',
                'password_confirmation' => null,
                AdminTest::TOKEN => csrf_token(),
            ],
            [
                'HTTP_X-Requested-With' => 'XMLHttpRequest'
            ]
        );

        // assert
        $response->assertJsonValidationErrors(['password_confirmation' => 'validation.required'], 'errors');
        $response->assertJson(['status' => 400]);
    }

    // ========================UPDATE==================
    // update data bio
    public function test_update_bio()
    {
        // setup
        Session::start();
        $this->login();

        // do something
        $user = User::orderBy('id', 'desc')->first();
        Storage::fake('dump');
        $photo = UploadedFile::fake()->image('profil.jpg')->size(100);
        $response = $this->post(
            '/admin/profile/' . $user->id,
            [
                'photo' => $photo,
                'email' => 'updated-email@testing.com',
                'username' => 'updated-username',
                'name' => 'updated-name',
                'phone' => fake()->phoneNumber(),
                'password' => AdminTest::PASSWORD,
                'password_confirmation' => AdminTest::PASSWORD,
                AdminTest::TOKEN => csrf_token(),
            ],
            [
                'HTTP_X-Requested-With' => 'XMLHttpRequest'
            ]
        );

        // assert
        $response->assertJson(['status' => 200, 'message' => 'Profile berhasil diupdate!']);
    }

    // update password
    public function test_update_password()
    {
        // setup
        Session::start();
        $this->login();

        // do something
        $user = User::orderBy('id', 'desc')->first();
        $response = $this->put(
            '/admin/changepassword/' . $user->id,
            [
                'currentPassword' => 'password',
                'newpassword' => 'newpassword',
                'newpassword_confirmation' => 'newpassword',
                AdminTest::TOKEN => csrf_token(),
            ],
            [
                'HTTP_X-Requested-With' => 'XMLHttpRequest'
            ]
        );

        // assert
        $response->assertJson(['status' => 200, 'message' => 'Passowrd berhasil diubah.']);
    }

    // ========================DELETE==================
    // delete super admin
    public function test_delete_first_admin()
    {
        // setup
        Session::start();
        $this->login();

        // do something
        $user = User::first();
        $response = $this->delete(
            '/admin/' . $user->id,
            [
                AdminTest::TOKEN => csrf_token(),
            ],
            [
                'HTTP_X-Requested-With' => 'XMLHttpRequest'
            ]
        );

        // assert
        $response->assertJson(['status' => 400, 'message' => 'Admin pertama tidak dapat dihapus.']);
    }

    // delete admin
    public function test_delete_admin()
    {
        // setup
        Session::start();
        $this->login();

        // do something
        $user = User::orderBy('id', 'desc')->first();
        $response = $this->delete(
            '/admin/' . $user->id,
            [
                AdminTest::TOKEN => csrf_token(),
            ],
            [
                'HTTP_X-Requested-With' => 'XMLHttpRequest'
            ]
        );

        // assert
        $response->assertJson(['status' => 200, 'message' => 'Admin berhasil dihapus.']);
    }
}
