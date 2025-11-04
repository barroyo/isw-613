<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class StudentSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['first_name' => 'Bladimir', 'email' => 'bladimir@gmail.com', 'last_name' => 'Lopez']
        ];

        $this->db->table('students')->insertBatch($data);
    }
}
