<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('demande_id')->unsigned();
            $table->foreign('demande_id')->references('id')->on('demandes')->onUpdate('cascade')->onDelete('cascade');
            $table->boolean('is_last')->default(1);
            $table->string('type_colis');
            
            $table->string('reference');
            $table->string('emballage')->nullable();
            $table->integer('nbr_colis');
            $table->integer('total_colis');
            $table->integer('sortant_colis')->default(0);
            $table->integer('reste_colis');
            $table->integer('retour')->default(0);
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
        Schema::dropIfExists('stocks');
        
     
    }
}
