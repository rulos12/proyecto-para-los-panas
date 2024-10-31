<?php

namespace App\Controllers;

use App\Models\ProductosM;

class ListaProductos extends BaseController
{
    public function index(): string
    {
        $productosM = model('ProductosM');
        $data['productos'] = $productosM->findAll();
        return view("productos/detalleProductos", $data);
    }
}
