<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Alumno;

class AlumnoTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function no_debe_guardar_un_alumno_con_email_duplicado()
    {

        Alumno::factory()->create(['email' => 'test@example.com']);


        try {
            Alumno::factory()->create(['email' => 'test@example.com']);
            $this->fail("Expected exception for duplicate email was not thrown.");
        } catch (\Illuminate\Database\QueryException $e) {

            $this->assertFalse(Alumno::where('email', 'test@example.com')->count() > 1, "Duplicate email should not exist.");
        }
    }

    /** @test */
    public function los_datos_deben_ser_exactamente_iguales()
    {
        // Create an alumno and retrieve it from the database
        $alumno = Alumno::factory()->create([
            'nombre' => 'Juan',
            'apellido' => 'Pérez',
            'email' => 'juan.perez@example.com',
            'edad' => 20,
        ]);

        // Assert the exact same values are stored in the database
        $this->assertSame('Juan', $alumno->nombre, "The 'nombre' field does not match.");
        $this->assertSame('Pérez', $alumno->apellido, "The 'apellido' field does not match.");
        $this->assertSame('juan.perez@example.com', $alumno->email, "The 'email' field does not match.");
        $this->assertSame(20, $alumno->edad, "The 'edad' field does not match.");
    }

    /** @test */
    public function actualiza_la_edad_correctamente()
    {
        // Create an alumno
        $alumno = Alumno::factory()->create(['edad' => 20]);

        // Update the 'edad' field
        $alumno->update(['edad' => 25]);

        // Assert that the updated value matches
        $this->assertEquals(25, $alumno->edad, "The 'edad' should be updated correctly.");
    }

    /** @test */
    public function la_edad_debe_ser_numerica()
    {
        // Create an alumno with a numeric 'edad'
        $alumno = Alumno::factory()->create(['edad' => 20]);

        // Assert that the 'edad' is numeric
        $this->assertIsNumeric($alumno->edad, "The 'edad' field must be numeric.");

        // Attempt to create an alumno with a non-numeric 'edad'
        try {
            Alumno::factory()->create(['edad' => 'veinte']);
            $this->fail("Expected exception for non-numeric edad was not thrown.");
        } catch (\Illuminate\Database\QueryException $e) {
            // Assert that the invalid 'edad' is not saved
            $this->assertFalse(Alumno::where('edad', 'veinte')->exists(), "Non-numeric 'edad' should not exist.");
        }
    }
}
