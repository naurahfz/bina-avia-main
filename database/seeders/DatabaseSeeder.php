<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Branch;
use App\Models\Testimonial;
use App\Models\Training;
use App\Models\User;
use File;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            "name" => "Naufal Ulinnuha",  
            "username" => "naufal",  
            "password" => bcrypt('admin'),
            "role" => "superadmin"
        ]);
        
        $branchs = json_decode(File::get("database/data/branchs.json"));
        foreach ($branchs as $key => $value) {
            Branch::create([
                "city" => $value->city,
                "address" => $value->address,
            ]);
        }

        Training::create([
            "name" => "Pramugari",  
            "image" => "1.png",  
            "description" => "Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi\r\n- dolor in reprehenderit\r\n- reprehenderit in voluptate\r\n- voluptate velit esse"
        ]);
        Training::create([
            "name" => "Ground Staff",  
            "image" => "2.png",  
            "description" => "Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore\r\n- dolor in reprehenderit\r\n- reprehenderit in voluptate\r\n- voluptate velit esse"
        ]);

        Testimonial::factory()->count(6)->create();
    }
}
