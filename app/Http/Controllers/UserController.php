<?php

namespace App\Http\Controllers;

use App\Enums\CategoryEnum;
use App\Interfaces\UserRepository;
use App\Models\Turn;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{

    protected UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index(){
        return view('screens.user-screen');
    }

    public function createTurn(Request $request)
    {
//        dd($request->all());

      $validated = $request->validate([
            'document' => 'required|string|min:5|max:20',
           'category' => [
               'required',
               'string',
             function ($attribute, $value, $fail) {
                    if (!CategoryEnum::tryFrom($value)) {
                       $fail('La categoría seleccionada no es válida.');
                    }
               },
            ],
        ]);


        try {
            $turn = $this->userRepository->createTurn($validated);


            $user = User::where('document', $validated['document'])->first();

            $message = $user
                ? "Turno generado exitosamente"
                : "Turno generado exitosamente. Recuerde que puede registrarse para acceder a más servicios.";

            // Redireccionar a la vista de confirmación
            return redirect()
                ->route('showTurn', $turn)
                ->with('success', $message)
                ->with('turn', [
                    'ticket' => $turn->ticket,
                    'date_attention' => $turn->date_attention->format('d/m/Y H:i'),
                ]);

        } catch (\Exception $e) {
            \Log::error('Error al generar turno: ' . $e->getMessage());

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Hubo un error al generar el turno. Por favor, intente nuevamente.');
        }
      }

      public function showTurn(Turn $turn)  : View
      {
          return view('screens.turns-show', compact('turn'));
      }

    }
