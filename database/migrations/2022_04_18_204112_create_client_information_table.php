<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_information', function (Blueprint $table) {
            $table->id();
            $table->boolean('cell')->nullable();
            $table->string('cell_package', 80)->nullable();
            $table->string('cell_operator', 30)->nullable();
            $table->decimal('cell_value')->nullable();
            $table->boolean('net')->nullable();
            $table->string('net_package', 80)->nullable();
            $table->string('net_operator', 30)->nullable();
            $table->decimal('net_value')->nullable();
            $table->boolean('telephone')->nullable();
            $table->string('telephone_package', 80)->nullable();
            $table->string('telephone_operator', 30)->nullable();
            $table->decimal('telephone_value')->nullable();
            $table->boolean('tv')->nullable();
            $table->string('tv_package', 80)->nullable();
            $table->string('tv_operator', 30)->nullable();
            $table->decimal('tv_value')->nullable();
            $table->tinyInteger('satisfaction')->nullable();
            $table->boolean('change_operator')->nullable();
            $table->text('observation')->nullable();
            $table->foreignId('client_id')
                ->constrained('clients')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_information');
    }
};
