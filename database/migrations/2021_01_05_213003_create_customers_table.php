<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('FirstName', 40);
            $table->string('LastName', 40);
            $table->string('City', 40);
            $table->string('Country', 40);
            $table->string('Phone', 20);

        });

        DB::table('customers')->insert(
            array(
                'FirstName' => 'Mohamad',
                'LastName' => 'Zid',
                'City' => 'Beirut',
                'Country' => 'Lebanon',
                'Phone' => '02015485546',
            )
        );

        DB::table('customers')->insert(
            array(
                'FirstName' => 'Samer',
                'LastName' => 'Salam',
                'City' => 'Damascus',
                'Country' => 'Syria',
                'Phone' => '555456687',
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
