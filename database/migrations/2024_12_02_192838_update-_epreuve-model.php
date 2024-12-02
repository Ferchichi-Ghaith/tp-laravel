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
        Schema::create('epreuves', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->date('date'); // Date of the test
            $table->time('time_begin'); // Time when the test begins
            $table->time('time_end'); // Time when the test ends
            $table->string('classroom'); // Classroom where the test will be held
            $table->enum('type', ['DS', 'DC']); // Type of test (DS for Devoir Surveillé, DC for Devoir Contrôlé)
            $table->foreignId('matiere_id') // Foreign key for Matiere
                  ->constrained('matieres') // Ensures the foreign key references 'id' on 'matieres'
                  ->onUpdate('cascade') // Updates when a related Matiere is updated
                  ->onDelete('cascade'); // Deletes epreuves when the related Matiere is deleted
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('epreuves');
    }
};
