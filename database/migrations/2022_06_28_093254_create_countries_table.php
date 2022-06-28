<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    /**
    * The database connection that should be used by the migration.
    *
    * @var string
    */
    protected $connection = 'mysql2';


    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('code', 50);
            $table->string('english_name', 100);
            $table->string('native_name', 100);
            $table->timestamps();
        });
    }

    /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down()
    {
        Schema::dropIfExists('countries');
    }
};
