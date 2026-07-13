<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Employee;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $staff = [
            [
                'name'         => 'Admin User',
                'email'        => 'admin@canteen.com',
                'phone'        => '09991234567',
                'address'      => 'Yangon, Myanmar',
                'password'     => Hash::make('admin123'),
                'start_time'   => '08:00:00',
                'end_time'     => '17:00:00',
                'role_as'      => 'admin',
                'image'=>'blah',
                'description'  => 'System administrator with full access.',
            ],
            [
                'name'         => 'Staff Member',
                'email'        => 'staff@canteen.com',
                'phone'        => '09997654321',
                'address'      => 'Mandalay, Myanmar',
                'password'     => Hash::make('staff123'),
                'start_time'   => '09:00:00',
                'end_time'     => '18:00:00',
                'role_as'      => 'staff',
                'image'=>'blah',
                'description'  => 'Front-of-house staff handling orders and customers.',
            ],
            [
                'name'         => 'Kitchen Chef',
                'email'        => 'chef@canteen.com',
                'phone'        => '09993456789',
                'address'      => 'Naypyidaw, Myanmar',
                'password'     => Hash::make('chef123'),
                'start_time'   => '07:00:00',
                'end_time'     => '16:00:00',
                'role_as'      => 'chef',
                'image'=>'blah',
                'description'  => 'Head chef responsible for menu preparation.',
            ],
        ];

        foreach ($staff as $data) {
            Employee::firstOrCreate(
                ['email' => $data['email']],
                $data
            );
        }
    }
}
