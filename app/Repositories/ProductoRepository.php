<?php

namespace App\Repositories;

use App\Models\Producto;

class ProductoRepository
{
  public function getAll()
  {
    return Producto::all();
  }

  public function find($id)
  {
    return Producto::findOrFail($id);
  }

  public function create(array $data)
  {
    return Producto::create($data);
  }

  public function update($id, array $data)
  {
    $producto = Producto::find($id);

    if (!$producto) {
      return null;
    }
    
    $producto->update($data);
    return $producto;
  }

  public function delete($id)
  {
    $producto = Producto::find($id);

    if (!$producto) {
      return null;
    }

    return $producto->delete();
  }
}