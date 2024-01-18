<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 25 customers, each having 10 invoices
        Customer::factory()
        ->count(25)  // Generate 25 customers
        ->hasInvoices(10)  // Each customer has 10 invoices
        ->create();  // Create the customers and their associated invoices

        // Create 100 customers, each having 5 invoices
        Customer::factory()
        ->count(100)  // Generate 100 customers
        ->hasInvoices(5)  // Each customer has 5 invoices
        ->create();  // Create the customers and their associated invoices
    
        // Create 100 customers, each having 3 invoices
        Customer::factory()
        ->count(100)  // Generate 100 customers
        ->hasInvoices(3)  // Each customer has 3 invoices
        ->create();  //Create the customers and their associated invoices

        // Create 5 customers without invoices
        Customer::factory()
        ->count(5)  // Generate 5 customers
        ->create();  // Create the customers without invoices

    }
}
