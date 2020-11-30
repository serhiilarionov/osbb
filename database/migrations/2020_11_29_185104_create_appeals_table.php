<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::connection()->getSchemaBuilder()->enableForeignKeyConstraints();

        Schema::create('appeals', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('text');

            $table->bigInteger('client_id')->unsigned();
            $table->index('client_id');
            $table->foreign('client_id')->references('id')->on('users')->onDelete('cascade');

            $table->boolean('in_work')->default(0);
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
        if (DB::getDriverName() !== 'sqlite') {
            Schema::table('appeals', function(Blueprint $table)
            {
                $table->dropForeign('appeals_client_id_foreign');
                $table->dropIndex('appeals_client_id_index');
                $table->dropColumn('client_id');
            });
        }
       
        Schema::dropIfExists('appeals');
    }
}
