<?php

namespace Database\Seeders;

use App\Models\Ticket;
use App\Models\Trip;
use App\Models\User;
use App\Models\Role;
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
        Trip::factory(1)->create(['num' => '1', 'from' => 'Урай', 'to' => 'Устье-Аха', 'from_time' => '05:00', 'to_time' => '07:30', 'duration' => '2ч 30м', 'tong' => 1, 'price' => '500']);
        Trip::factory(1)->create(['num' => '2','from' => 'Урай', 'to' => 'Устье-Аха', 'from_time' => '14:30', 'to_time' => '17:00', 'duration' => '2ч 30м', 'tong' => 1, 'price' => '500']);
        Trip::factory(1)->create(['num' => '3','from' => 'Устье-Аха', 'to' => 'Урай', 'from_time' => '11:50', 'to_time' => '13:30', 'duration' => '1ч 40м', 'tong' => 1, 'price' => '500']);
        Trip::factory(1)->create(['num' => '4','from' => 'Устье-Аха', 'to' => 'Урай', 'from_time' => '23:00', 'to_time' => '01:30', 'duration' => '2ч 30м', 'tong' => 1, 'change_date' => '1', 'price' => '500']);
        Trip::factory(1)->create(['num' => '5','from' => 'Урай', 'to' => 'Ханты-Мансийск', 'from_time' => '00:05', 'to_time' => '05:45','duration' => '4ч 40м', 'price' => '1300']);
        Trip::factory(1)->create(['num' => '5','from' => 'Урай', 'to' => 'Нефтеюганск', 'from_time' => '00:05', 'to_time' => '09:00', 'duration' => '8ч 55м', 'price' => '2200']);
        Trip::factory(1)->create(['num' => '5','from' => 'Урай', 'to' => 'Сургут', 'from_time' => '00:05', 'to_time' => '10:00', 'duration' => '9ч 55м', 'price' => '2400']);
        Trip::factory(1)->create(['num' => '6','from' => 'Ханты-Мансийск', 'to' => 'Урай', 'from_time' => '12:00', 'to_time' => '17:45', 'duration' => '5ч 45м', 'price' => '1300']);
        Trip::factory(1)->create(['num' => '7','from' => 'Урай', 'to' => 'Ханты-Мансийск', 'from_time' => '06:00', 'to_time' => '11:30', 'duration' => '5ч 30м', 'price' => '1300']);
        Trip::factory(1)->create(['num' => '8','from' => 'Ханты-Мансийск', 'to' => 'Урай', 'from_time' => '16:00', 'to_time' => '21:30', 'duration' => '5ч 30м', 'price' => '1300']);
        Trip::factory(1)->create(['num' => '9','from' => 'Югорск', 'to' => 'Урай', 'from_time' => '08:00', 'to_time' => '11:30', 'duration' => '3ч 30м', 'price' => '1000']);
        Trip::factory(1)->create(['num' => '9','from' => 'Советский', 'to' => 'Урай', 'from_time' => '08:00', 'to_time' => '11:30', 'duration' => '3ч 30м', 'price' => '1000']);
        Trip::factory(1)->create(['num' => '10','from' => 'Урай', 'to' => 'Советский', 'from_time' => '13:50', 'to_time' => '17:05', 'duration' => '3ч 15м', 'price' => '1000']);
        Trip::factory(1)->create(['num' => '10','from' => 'Урай', 'to' => 'Югорск', 'from_time' => '13:50', 'to_time' => '17:05', 'duration' => '3ч 15м', 'price' => '1000']);
        Trip::factory(1)->create(['num' => '11','from' => 'Урай', 'to' => 'Нягань', 'from_time' => '05:00', 'to_time' => '10:00', 'duration' => '3ч 00м', 'price' => '1300']);
        Trip::factory(1)->create(['num' => '11','from' => 'Урай', 'to' => 'Советский', 'from_time' => '05:00', 'to_time' => '08:00', 'duration' => '2ч 00м', 'price' => '1000']);
        Trip::factory(1)->create(['num' => '11','from' => 'Советский', 'to' => 'Нягань', 'from_time' => '08:00', 'to_time' => '10:00', 'duration' => '5ч 00м', 'price' => '600']);
        Trip::factory(1)->create(['num' => '12','from' => 'Нягань', 'to' => 'Урай', 'from_time' => '14:00', 'to_time' => '19:00', 'duration' => '5ч 00м', 'price' => '1300']);
        Trip::factory(1)->create(['num' => '12','from' => 'Нягань', 'to' => 'Советский', 'from_time' => '14:00', 'to_time' => '16:00', 'duration' => '2ч 00м', 'price' => '600']);
        Trip::factory(1)->create(['num' => '12','from' => 'Советский', 'to' => 'Урай', 'from_time' => '16:00', 'to_time' => '19:00', 'duration' => '3ч 00м', 'price' => '1000']);

        User::factory(1)->create(['name' => 'TK999', 'email' => 'admin@tk999.ru', 'password' => '$2y$10$Q6LMrwwXfKtSZt7g.a4QSOZ/3jBPARVCW9a40T1l57kwZlur6.ECi']);
        User::factory(1)->create(['name' => 'agentM2', 'email' => 'm2@tk999.ru', 'password' => '$2y$10$Q6LMrwwXfKtSZt7g.a4QSOZ/3jBPARVCW9a40T1l57kwZlur6.ECi']);
        User::factory(1)->create(['name' => 'agentM3', 'email' => 'm3@tk999.ru', 'password' => '$2y$10$Q6LMrwwXfKtSZt7g.a4QSOZ/3jBPARVCW9a40T1l57kwZlur6.ECi']);
        User::factory(1)->create(['name' => 'agentHM', 'email' => 'HM@tk999.ru', 'password' => '$2y$10$Q6LMrwwXfKtSZt7g.a4QSOZ/3jBPARVCW9a40T1l57kwZlur6.ECi']);

        Role::setStartRoles();
        Role::giveStartPermission();

        /* Фейковые билеты */
//        Ticket::Factory(500)->create();
    }
}
