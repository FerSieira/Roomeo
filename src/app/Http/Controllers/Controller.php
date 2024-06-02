<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

// Cuando instale breeze aparecio.
// Por lo que he vvisto proporciona metodos como validate para validar los datos de entrada
// Una especie de controlador base que genera Breeze
class Controller extends BaseController {
    use AuthorizesRequests, ValidatesRequests;
}
