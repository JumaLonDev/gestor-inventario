<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Services\ProductoService;
use Illuminate\Http\Request;

use function Laravel\Prompts\progress;

class ProductoController extends Controller
{
    protected $productoService;

    public function __construct(ProductoService $productoService)
    {
        $this->productoService = $productoService;
    }

    public function index()
    {
        $productos = $this->productoService->listar();

        return response()->json([
            'success' => true,
            'data' => $productos,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'sku' => 'required|string|max:100|unique:productos',
            'precio' => 'required|numeric|min:0',
            'cantidad' => 'required|numeric|min:0',

        ]);

        $producto = Producto::create($validated);

        return response()->json([
            'mensaje' => 'Producto creado correctamente',
            'producto' => $producto,
        ], 201);
    }

    public function show($id)
    {
        $producto = $this->productoService->obtener($id);

        return response()->json([
            'success' => true,
            'data' => $producto,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'sku' => 'required|string|max:100|unique:productos,sku,' . $id,
            'precio' => 'required|numeric|min:0',
            'cantidad' => 'required|numeric|min:0',
        ]);

        $producto = $this->productoService->actualizar($id, $validated);

        if (!$producto) {
            return response()->json([
                'mensaje' => 'Producto no encontrado',
            ], 404);
        }

        return response()->json([
            'mensaje' => 'Producto actualizado correctamente',
            'producto' => $producto,
        ]);
    }

    public function delete($id)
    {
        $eliminado = $this->productoService->eliminar($id);

        if (!$eliminado) {
            return response()->json([
                'mensaje' => 'Producto no encontrado',
            ], 404);
        }

        return response()->json([
            'mensaje' => 'Producto eliminado correctamente',
        ]);
    }
}
