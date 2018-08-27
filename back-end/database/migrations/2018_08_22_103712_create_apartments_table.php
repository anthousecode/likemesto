<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('room');
            $table->string('floor')->nullable();
            $table->string('area')->nullable();
            $table->string('abbreviated');
            $table->string('img');
            $table->string('price_doll');
            $table->string('price_euro');
            $table->string('price_ua');
            $table->string('conditions_1')->nullable();
            $table->string('conditions_2')->nullable();
            $table->string('map');
            $table->string('vip');
            $table->string('view');
            $table->string('greeting');
            $table->string('size')->nullable();
            $table->string('floors')->nullable();
            $table->string('agent_name')->nullable();
            $table->string('agent_phone');
            $table->string('agent_email')->nullable();
            $table->string('agency');
            $table->string('address_table');
            $table->string('room_table');
            $table->string('area_table')->nullable();
            $table->string('living_area_table')->nullable();
            $table->string('kitchen_area_table')->nullable();
            $table->string('floor_table');
            $table->string('all_floors_table');
            $table->string('layout_table');
            $table->string('type_of_building_table');
            $table->string('type_of_walls_table');
            $table->string('type_of_windows_table');
            $table->string('type_of_heating_table');
            $table->string('price_table');
            $table->string('commission_table')->nullable();
            $table->text('text');
            $table->string('type');
            $table->integer('abroad');
            $table->string('city');
            $table->integer('active');
            $table->integer('user_id');
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
        Schema::dropIfExists('apartments');
    }
}
