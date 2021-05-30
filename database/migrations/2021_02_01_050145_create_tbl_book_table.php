<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblBookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_book', function (Blueprint $table) {
            $table->bigIncrements('bookid');
            $table->string('bookname');
            $table->integer('authorid');
            $table->integer('categoryid');
            $table->string('bookimage');
            $table->integer('available');
            $table->integer('bookprice')->default(0);
            $table->string('bookSKU');
            $table->text('bookinfo');
            $table->tinyInteger('bookstatus');	
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('NULL ON UPDATE CURRENT_TIMESTAMP'))->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_book');
    }
}
