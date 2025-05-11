<?php
// database\migrations\2025_05_11_102420_create_customers_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('email')->unique();
            $table->string('phone_number');
            $table->text('address')->nullable();

            // pindahkan nullable() sebelum constrained() dan gunakan nullOnDelete()
            $table->foreignId('package_id')
                  ->nullable()
                  ->constrained('packages')
                  ->nullOnDelete();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
