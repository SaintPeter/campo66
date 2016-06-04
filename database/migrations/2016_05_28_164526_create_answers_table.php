<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->increments('id');
             $table->integer('guest_id')->unsigned();
            $table->foreign('guest_id')
                  ->references('id')->on('guests')
                  ->onDelete('cascade');
            $table->string('married_name');
            $table->string('spouse_name');
            $table->string('address1');
            $table->string('address2');
            $table->string('city');
            $table->string('state');
            $table->string('zip');

            $table->string('phone1');
            $table->string('phone1type');
            $table->string('phone2');
            $table->string('phone2type');
            $table->string('phone3');
            $table->string('phone3type');

            $table->string('email');
            $table->string('email2');

            $table->string('moved');
            $table->string('furthest');
            $table->string('schooling');
            $table->string('book');
            $table->string('coolestjob');
            $table->text('occupation');
            $table->boolean('retired');
            $table->string('retired_date');
            $table->text('children');
            $table->text('grandchildren');
            $table->text('greatgrandchildren');
            $table->text('countries');
            $table->string('furthest_country');
            $table->text('highlights');
            $table->text('achievement');
            $table->text('differently');
            $table->text('last_words');
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
        Schema::drop('answers');
    }
}
