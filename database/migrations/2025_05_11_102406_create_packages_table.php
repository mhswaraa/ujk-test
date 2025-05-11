<?php
// database\migrations\2025_05_11_102406_create_packages_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();                           // id (auto-increment, primary key)
            $table->string('name', 255);            // nama paket, misal "30Mb"
            $table->integer('speed');               // kecepatan dalam Mbps
            $table->decimal('price', 10, 2);        // harga, decimal 10,2
            $table->timestamps();                   // created_at & updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('packages');
    }
}
