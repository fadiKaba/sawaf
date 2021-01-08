<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('ProductName', 50);
            $table->unsignedBigInteger('SupplierId');
            $table->decimal('UnitPrice', 12, 2)->default(0);
            $table->foreign('SupplierId')->references('id')->on('suppliers')->onDelete('cascade');
        });

        DB::table('products')->insert(
            array(
                'ProductName' => 'Chai',
                'SupplierId' => '1',
                'UnitPrice' => '45',
            )
        );
        DB::table('products')->insert(
            array(
                'ProductName' => 'Rice',
                'SupplierId' => '1',
                'UnitPrice' => '555',
            )
        );
        DB::table('products')->insert(
            array(
                'ProductName' => 'Sugar',
                'SupplierId' => '2',
                'UnitPrice' => '770',
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
        Schema::dropIfExists('products');
    }
}
