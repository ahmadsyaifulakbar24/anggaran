<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateVwAssigmentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        DB::statement("DROP VIEW IF EXISTS vw_assignment_detail");
        DB::statement("
            CREATE VIEW vw_assignment_detail as
            SELECT 
                a.*, 
                b.unit_id, 
                b.user_id, 
                b.budged, 
                b.admin_status
            FROM assignments a
            LEFT JOIN work_plans b ON a.work_plan_id = b.id
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('vw_assigment_details');
    }
}
