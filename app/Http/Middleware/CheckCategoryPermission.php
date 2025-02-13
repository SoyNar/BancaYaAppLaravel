<?php

namespace App\Http\Middleware;

use App\Enums\CategoryEnum;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckCategoryPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    /**
     * Este midlewate se encarga de validar que categorias puede acceder un usuario
     * se verifica que el usuario este registrado en la base de datos
     * que la categoria sea valida
     * si el usuario esta registrado puede acceder a todas las categorias de atencion
     * si el usuario no esta registrado solo puede acceder a 2 categorias
     *
    */
    public function handle(Request $request, Closure $next): Response


    {
//        dd("datos del midleware", $request->all());
        $document = $request->input('document');
        $category = $request->input('category');

        if (!CategoryEnum::tryFrom($category)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Categoría no válida. Por favor, seleccione una categoría válida.');
        }

        $registeredUser = User::where('document', $document)->first();

        if ($registeredUser) {
            return $next($request);
        }

        $permittedCategories = [
            CategoryEnum::ACCOUNT_OPENING->value,
            CategoryEnum::CONSULTATION_ASSESSMENT->value
        ];

        if (!in_array($category, $permittedCategories)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Esta categoría requiere registro previo. Por favor, regístrese para continuar.');
        }

        return $next($request);
    }
}
