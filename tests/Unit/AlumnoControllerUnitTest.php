<?php

namespace Tests\Unit;

use App\Http\Controllers\AlumnosController;
use App\Models\Alumno;
use App\Http\Controllers\AlumnoController;
use http\Env\Request;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

class AlumnoControllerUnitTest extends TestCase
{
    /*
    public function test_probar_validacion_falla_para_crear_Alumnos():void
    {
        //variable para controlador
        $controller= new AlumnosController();
        $request= Request::create('/alumnos','POST',[
            'name'=>'Kevin',
            'last_name'=>'Calix',
            'email'=>'kCalix@unicah.edu'
    ]);

        $this->expectException(ValidationException::class);
        $response=$controller->store($request);
        $this->assertTrue($response->isRedirect(route('alumnos.index')));
    }
*/

}
