<?php

namespace Database\Seeders;

use App\Models\Expenditure;
use App\Models\Transaction;
use Faker\Factory as Faker;
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
        // \App\Models\User::factory(10)->create();
        $this->expenditure();
        $this->transaction();
    }

    private function transaction()
    {
        $faker = Faker::create();

        $transactions = [];

        for ($i = 1; $i <= 7000; $i++) {
            $transactions[] = [
                'UserId' => 24010070,
                'NameObject' => $faker->word,
                'TransactionDate' => $faker->dateTimeBetween('2020-10-01', '2024-05-31')->format('Y-m-d'),
                'Quantity' => $faker->numberBetween(100, 250),
                'PricePerKg' => $faker->numberBetween(6000, 10000)
            ];
        }

        // Menyisipkan data transactions ke dalam tabel transactions
        foreach ($transactions as $transaction) {
            Transaction::create($transaction);
        }
    }
    private function expenditure()
    {
        $faker = Faker::create();

        $expenditures = [];

        for ($i = 1; $i <= 1000; $i++) {
            $expenditures[] = [
                'UserId' => 24010070,
                'NameExpenditure' => $faker->word,
                'Description' => $faker->sentence,
                'ExpenditureDate' => $faker->dateTimeBetween('2020-01-01', '2024-06-31')->format('Y-m-d'),
                'Amount' => $faker->numberBetween(100000, 10000000)
            ];
        }

        // Menyisipkan data expenditures ke dalam tabel expenditures
        foreach ($expenditures as $exp) {
            Expenditure::create($exp);
        }
    }
}
