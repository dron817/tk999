<?php

namespace Database\Seeders;

use App\Models\Ticket;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /* Маршруты */
        \App\Models\Trip::factory(1)->create(['num' => '1', 'from' => 'Урай', 'to' => 'Устье-Аха', 'from_time' => '05:00', 'to_time' => '07:30', 'duration' => '2ч 30м',  'from_desc' => 'сбор по остановкам', 'price' => '500']);
        \App\Models\Trip::factory(1)->create(['num' => '2','from' => 'Урай', 'to' => 'Устье-Аха', 'from_time' => '14:30', 'to_time' => '17:00', 'duration' => '2ч 30м', 'price' => '500']);
        \App\Models\Trip::factory(1)->create(['num' => '3','from' => 'Устье-Аха', 'to' => 'Урай', 'from_time' => '11:50', 'to_time' => '13:30', 'duration' => '1ч 40м', 'price' => '500']);
        \App\Models\Trip::factory(1)->create(['num' => '4','from' => 'Устье-Аха', 'to' => 'Урай', 'from_time' => '23:00', 'to_time' => '01:30', 'duration' => '2ч 30м', 'change_date' => '1', 'price' => '500']);
        \App\Models\Trip::factory(1)->create(['num' => '5','from' => 'Урай', 'to' => 'Ханты-Мансийск', 'from_time' => '00:05', 'to_time' => '05:45','duration' => '4ч 40м', 'price' => '1300']);
        \App\Models\Trip::factory(1)->create(['num' => '5','from' => 'Урай', 'to' => 'Нефтеюганск', 'from_time' => '00:05', 'to_time' => '09:00', 'duration' => '8ч 55м', 'price' => '2200']);
        \App\Models\Trip::factory(1)->create(['num' => '5','from' => 'Урай', 'to' => 'Сургут', 'from_time' => '00:05', 'to_time' => '10:00', 'duration' => '9ч 55м', 'price' => '2400']);
        \App\Models\Trip::factory(1)->create(['num' => '6','from' => 'Ханты-Мансийск', 'to' => 'Урай', 'from_time' => '12:00', 'to_time' => '17:45', 'duration' => '5ч 45м', 'price' => '1300']);
        \App\Models\Trip::factory(1)->create(['num' => '7','from' => 'Урай', 'to' => 'Ханты-Мансийск', 'from_time' => '06:00', 'to_time' => '11:30', 'duration' => '5ч 30м', 'price' => '1300']);
        \App\Models\Trip::factory(1)->create(['num' => '8','from' => 'Ханты-Мансийск', 'to' => 'Урай', 'from_time' => '16:00', 'to_time' => '21:30', 'duration' => '5ч 30м', 'price' => '1300']);
        \App\Models\Trip::factory(1)->create(['num' => '9','from' => 'Югорск', 'to' => 'Урай', 'from_time' => '08:00', 'to_time' => '11:30', 'duration' => '3ч 30м', 'price' => '1000']);
        \App\Models\Trip::factory(1)->create(['num' => '9','from' => 'Советский', 'to' => 'Урай', 'from_time' => '08:00', 'to_time' => '11:30', 'duration' => '3ч 30м', 'price' => '1000']);
        \App\Models\Trip::factory(1)->create(['num' => '10','from' => 'Урай', 'to' => 'Советский', 'from_time' => '13:50', 'to_time' => '17:05', 'duration' => '3ч 15м', 'price' => '1000']);
        \App\Models\Trip::factory(1)->create(['num' => '10','from' => 'Урай', 'to' => 'Югорск', 'from_time' => '13:50', 'to_time' => '17:05', 'duration' => '3ч 15м', 'price' => '1000']);
        \App\Models\Trip::factory(1)->create(['num' => '11','from' => 'Урай', 'to' => 'Нягань', 'from_time' => '05:00', 'to_time' => '10:00', 'duration' => '3ч 00м', 'price' => '1300']);
        \App\Models\Trip::factory(1)->create(['num' => '11','from' => 'Урай', 'to' => 'Советский', 'from_time' => '05:00', 'to_time' => '08:00', 'duration' => '2ч 00м', 'price' => '1000']);
        \App\Models\Trip::factory(1)->create(['num' => '11','from' => 'Советский', 'to' => 'Нягань', 'from_time' => '08:00', 'to_time' => '10:00', 'duration' => '5ч 00м', 'price' => '600']);
        \App\Models\Trip::factory(1)->create(['num' => '12','from' => 'Нягань', 'to' => 'Урай', 'from_time' => '14:00', 'to_time' => '19:00', 'duration' => '5ч 00м', 'price' => '1300']);
        \App\Models\Trip::factory(1)->create(['num' => '12','from' => 'Нягань', 'to' => 'Советский', 'from_time' => '14:00', 'to_time' => '16:00', 'duration' => '2ч 00м', 'price' => '600']);
        \App\Models\Trip::factory(1)->create(['num' => '12','from' => 'Советский', 'to' => 'Урай', 'from_time' => '16:00', 'to_time' => '19:00', 'duration' => '3ч 00м', 'price' => '1000']);

        /* Фейковые билеты */
        Ticket::Factory(200)->create();
    }
}
