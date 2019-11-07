<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $categories = array(
            [
                'type' => 'Student Ticket',
                'avilable_tickets' => 200,
                'price' => 200,
            ],
            [
                'type' => 'Normal Ticket',
                'avilable_tickets' => 200,
                'price' => 400,
            ]

        );

        DB::table('categories')->insert($categories);
    }
}
