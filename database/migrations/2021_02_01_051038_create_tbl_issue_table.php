<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblIssueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_issue', function (Blueprint $table) {
            $table->bigIncrements('issueid');
            $table->string('bookname');
            $table->string('username');
            $table->integer('issuebilling')->default(0);
            $table->date('issuedate')->default(DB::raw('CURRENT_TIMESTAMP'));	
            $table->date('returndate')->nullable();
            $table->text('issueinfo');
            $table->integer('issuestatus');	
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
        Schema::dropIfExists('tbl_issue');
    }
}
