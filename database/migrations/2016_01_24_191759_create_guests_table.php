<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('married_name');
            $table->string('spouse_name');
            $table->string('address1');
            $table->string('address2');
            $table->string('city');
            $table->string('state');
            $table->string('zip');
            $table->text('notes');
            $table->boolean('found96');
            $table->boolean('found16');
            $table->string('status')->default('Unknown');
            $table->string('phone1');
            $table->string('phone1type');
            $table->string('phone2');
            $table->string('phone2type');
            $table->string('phone3type');
            $table->string('phone3');
            $table->string('email');
            $table->string('email2');
            $table->boolean('married')->default(0);
            $table->integer('married_times');
            $table->integer('children');
            $table->text('children_names');
            $table->text('education');
            $table->text('employment');
            $table->text('hobbies');
            $table->text('unexpected_event');
            $table->text('greatest_accomplishment');
            $table->text('travel');
            $table->text('notdone');
            $table->string('miles');
            $table->string('dlnum');
            $table->string('quest');
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
        Schema::drop('guests');
    }
}
