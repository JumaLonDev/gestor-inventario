<?php

namespace App\Services;

use App\Repositories\ProductoRepository;

class ProductoService
{
    protected $productoRepository;

    public function __construct(ProductoRepository $productoRepository)
    {
        $this->productoRepository = $productoRepository;
    }

    public function listar()
    {
        return $this->productoRepository->getAll();
    }

    public function crear(array $data)
    {
        return $this->productoRepository->create($data);
    }

    public function actualizar($id, array $data)
    {
        return $this->productoRepository->update($id, $data);
    }

    public function eliminar($id)
    {
        return $this->productoRepository->delete($id);
    }

    public function obtener($id)
    {
        return $this->productoRepository->find($id);
    }
}
