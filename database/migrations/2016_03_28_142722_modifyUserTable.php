<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
             $table->string('address',60)->nullable();
			 $table->string('number',10)->nullable();
			 $table->string('district',30)->nullable();
			 $table->string('city',40)->nullable();
			 $table->string('state',30)->nullable();
			 $table->string('zipcode',20)->nullable();
			 $table->string('phone',20)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->removeColumn('address');
			$table->removeColumn('number');
			$table->removeColumn('district');
			$table->removeColumn('city');
			$table->removeColumn('state');
			$table->removeColumn('zipcode');
			$table->removeColumn('phone');
        });
    }
}
