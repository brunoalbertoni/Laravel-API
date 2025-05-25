<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
    Schema::table('funcionarios', function (Blueprint $table) {
        $table->unsignedBigInteger( "departamentos_id" )->nullable();
        $table->foreign("departamentos_id" )->references("id")->on("departamentos" );
});
    }

public function departamentos(){
    return $this->belongsTo(
        Departamentos::class,
        'departamentos_id',
        'id'
    );
}

public function funcionarios(){
    return $this->belongsTo(
        Funcionarios::class,
        'departamentos_id',
        'id'
    );
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
