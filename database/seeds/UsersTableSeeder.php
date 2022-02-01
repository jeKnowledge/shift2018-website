<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\Edition;
use Carbon\Carbon;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $admin = User::create([
            'name' => 'John Doe',
            'email' => 'admin@shift.com',
            'password' => bcrypt('secret'),
            'job' => 'Admin',
            'role' => 0,
        ]);

				$shifter = User::create([
					'name' => 'True Shifter',
					'email' => 'shifter@shift.com',
					'password' => bcrypt('shifter'),
					'job' => 'Student',
					'role' => 1
				]);

        $partner = User::create([
					'name' => 'True Partner',
					'email' => 'partner@shift.com',
					'password' => bcrypt('partner'),
					'role' => 2
				]);

        $staff = User::create([
					'name' => 'True Staff',
					'email' => 'staff@shift.com',
					'password' => bcrypt('staff'),
					'role' => 3
				]);

        $partner = User::create([
					'name' => 'True User',
					'email' => 'user@shift.com',
					'password' => bcrypt('user'),
					'role' => 4
				]);

        /*

        if(App::environment('staging', 'local')){

            $shifter = User::create([
                'name' => 'John Doe',
                'email' => 'shifter@shift.com',
                'password' => bcrypt('secret'),
                'job' => 'Shifter',
                'role' => 1,
            ]);

            $edition = Edition::where('year',Carbon::now()->year)->first();

            $edition->partners()->create([
                'name' => 'Company John Doe',
                'email' => 'gold@shift.com',
                'website' => 'Coimbra',
                'logoPath' => 'My Logo',
                'type' => 'gold',
            ]);

            $partner = $edition->partners()->first();

            $info = [
                'name' => 'John Doe',
                'email' => 'gold@shift.com',
                'password' => bcrypt('secret'),
            ];

            $partner->users()->create($info);

            $partnerUser = $partner->users()->first();

            $partnerRole = Role::whereName('gold-partner')->first();

            $partnerUser->roles()->attach($partnerRole);

            $edition->partners()->create([
                'name' => 'Company John Doe',
                'email' => 'silver@shift.com',
                'website' => 'Coimbra',
                'logoPath' => 'My Logo',
                'type' => 'silver',
            ]);

            $partner = $edition->partners()->where('email', 'like', 'silver@shift.com')->first();

            $info = [
                'name' => 'John Doe',
                'email' => 'silver@shift.com',
                'password' => bcrypt('secret'),
            ];

            $partner->users()->create($info);

            $partnerUser = $partner->users()->first();

            $partnerRole = Role::whereName('silver-partner')->first();

            $partnerUser->roles()->attach($partnerRole);
        }*/
    }
}
