<?php


use App\Models\Alumno;
use PHPUnit\Framework\ExpectationFailedException;
use Tests\TestCase;

class AlumnoUnitTest extends TestCase
{

    /** @test */
    public function test_nombre_es_igual_a_juan()
    {
        // Crear un alumno con el nombre 'Juan'
        $alumno = Alumno::factory()->create([
            'nombre' => 'Juan',
        ]);

        // Asegurarse de que el 'nombre' sea exactamente 'Juan'
        $this->assertSame('Juan', $alumno->nombre, 'El nombre debe ser exactamente "Juan"');
    }

    /** @test */
    public function test_edad_es_un_numero()
    {
        $alumno = Alumno::factory()->create([
            'edad' => 25,
        ]);

        $this->assertIsNumeric($alumno->edad, 'La edad debe ser un valor numérico');
    }

    /** @test */
    public function test_edad_es_igual_a_30()
    {
        //
        $alumno = Alumno::factory()->create([
            'edad' => 30,
        ]);

        // Asegurarse de que la edad sea exactamente 30 con el AssertEquals
        $this->assertEquals(30, $alumno->edad, 'La edad debe ser 30');
    }

    /** @test */
    public function test_edad_no_es_menor_que_18()
    {
        $alumno = Alumno::factory()->create([
            'edad' => 18, //si le pongo una edad menor, sale error entonces si funciona
        ]);

        $this->assertFalse($alumno->edad < 18, 'La edad no debe ser menor a 18');
    }


}
