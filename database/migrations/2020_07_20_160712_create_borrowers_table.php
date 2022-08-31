<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorrowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrowers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('step')->nullable();
            $table->json('steps')->nullable();
            $table->string('login_id')->nullable();
            $table->decimal('monthly_sales', 12, 2)->nullable();
            $table->decimal('monthly_expenses', 12, 2)->nullable();
            $table->boolean('other_financing')->nullable();
            $table->decimal('other_financing_amount', 12, 2)->nullable();
            $table->string('legal_business_name')->nullable();
            $table->string('business_physical_address')->nullable();
            $table->string('business_physical_city')->nullable();
            $table->string('business_physical_province', 2)->nullable();
            $table->string('business_physical_postal')->nullable();
            $table->string('email')->nullable();
            $table->date('dob');

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
        Schema::dropIfExists('borrowers');
    }
}
