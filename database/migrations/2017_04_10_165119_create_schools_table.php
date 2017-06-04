<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });

        DB::table('schools')->insert(
            array(
                'name' => 'Karel-de-Grote',
                'description' => 'Alumni van de Karel de Grote Hogeschool zijn echte professionals. Ze zijn omgevingsbewust en hebben inzicht in de (f)actoren, competenties, waarden en attitudes om tegelijk met kennis van zaken én empathisch en geëngageerd te handelen. Daardoor kunnen zij interculturele en internationale netwerken opzetten, en ook inzetten. Het zijn professionals die constructief en creatief samenwerken om tot betere en breed gedragen resultaten te komen. Ze werken doelgericht, durven dromen omzetten in daden en zijn innovatief en inspirerend. Uitgedaagd door de snel evoluerende context waarin zij werken, blijven zij steeds verder leren. Ze zijn flexibel en gaan pro-actief en duurzaam met veranderingen om. Ze mikken altijd weer hoger in het verwerven van de juiste competenties. Ze nemen hun eigen ontwikkeling in handen en dragen zo bij tot een duurzame lokale en globale samenleving. '
            )
        );

        DB::table('schools')->insert(
            array(
                'name' => 'Universiteit Antwerpen',
                'description' => 'De Universiteit Antwerpen is een jonge, dynamische en toekomstgerichte universiteit. Ze integreert de troeven van haar historische wortels in haar ambitie positief bij te dragen aan de samenleving.'
            )
        );

        DB::table('schools')->insert(
            array(
                'name' => 'Artesis Plantijn',
                'description' => 'AP is een hogeschool met zo’n 12.000 studenten, 19 HBO5-opleidingen, 24 professionele bachelor- en 8 artistieke opleidingen, verdeeld over 4 departementen en 2 schools of arts. Ook al is de fusiehogeschool nieuw, toch hebben we al een lange geschiedenis, denk maar aan de Koninklijke Academie voor Schone Kunsten en het Koninklijk Conservatorium Antwerpen. '
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schools');
    }
}
