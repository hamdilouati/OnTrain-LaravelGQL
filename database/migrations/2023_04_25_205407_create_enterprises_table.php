<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnterprisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enterprises', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->date('registered_at')->nullable();
            $table->text('logo_url')->nullable();
        });

        Schema::create('enterprise_person', function (Blueprint $table) {
            $table->timestamps();
            $table->string('role')->nullable();
            $table->date('from_date')->nullable();
            $table->date('to_date')->nullable();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('enterprise_id');

            $table->foreign('enterprise_id')->references('id')->on('enterprises')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('enterprise_person', function(Blueprint $table) {
            $table->dropForeign(['enterprise_id']);
        });
        Schema::dropIfExists('enterprises');
        Schema::dropIfExists('enterprise_person');
    }
}
