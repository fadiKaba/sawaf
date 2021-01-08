<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('CompanyName', 40);
            $table->string('ContactName', 50);
            $table->string('City', 40);
            $table->string('Country', 40);
            $table->string('Phone', 30)->nullable();
            $table->string('Fax', 30)->nullable();
        });

        DB::table('suppliers')->insert(
            array(
                'CompanyName' => 'SwafTech',
                'ContactName' => 'Ahmad',
                'City' => 'Damascus',
                'Country' => 'Syria',
                'Phone' => '33324587',
                'Fax' => '33324588',
            )
        );

        DB::table('suppliers')->insert(
            array(
                'CompanyName' => 'Durra',
                'ContactName' => 'سعيد',
                'City' => 'دمشق',
                'Country' => 'سوريا',
                'Phone' => '0113855454',
                'Fax' => '33324588',
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
        Schema::dropIfExists('suppliers');
    }
}
