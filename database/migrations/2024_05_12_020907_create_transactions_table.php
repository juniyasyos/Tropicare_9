<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id('TransactionID');
            $table->unsignedBigInteger('UserId');
            $table->string('NameObject');
            $table->date('TransactionDate')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('Quantity');
            $table->decimal('PricePerKg', 10, 2);
            $table->timestamps();

            // Define foreign key constraint
            $table->foreign('UserId')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
