<?php

namespace App\Controllers;

class Producto extends BaseController
{
    public $csrfProtection = 'session';
    public $tokenRandomize = true;
    protected $helpers = ['form'];

    public function valida(){
        $session = session();
        $session->has('logged_in');
        
            if($session->has('logged_in')){
                return redirect()->to(base_url('/usuario'));
                
            }
        
        print_r($_SESSION);
    }

    public function login(): string
    {
        $productoM = model('ProductosM');
        $data['productos'] = $productoM->findAll();
        return view('pagina/topMenu').
        view('pagina/login', $data);
    }

    public function validaUsuario(){
        $session = session();
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];
 

        $clienteM = model('ClientesModel');
        $cliente = $clienteM->valida($usuario,$password);

        if (count($cliente)>0) {
            $newdata = [
                'nombre' => $cliente[0]->nombre,
                'correo' => $cliente[0]->correo,
                'telefono' => $cliente[0]->telefono,
                'direccion' => $cliente[0]->direccion,
                'logged_in' => TRUE,
                'carrito' => NULL,
                'tipo' => 'CLIENTE'
            ];
            $session->set($newdata);
            return redirect()->to(base_url('/pagina'));
        }
        else {
            print "no hay";
        }
        
    }
    public function listaProductos(): string
    {
        $productoM = model('ProductosM');
        $data['productos'] = $productoM->findAll();
        return view('pagina/topMenu') .
            view('pagina/listaProducto', $data);
    }

    public function verDetalle($idProducto)
    {
        $productoM = model('ProductosM');
        $data['producto'] = $productoM->where('idProducto', $idProducto)->findAll();
        return view('pagina/topMenu') .
            view('pagina/detalleProducto', $data);
    }


    public function salir(){

        $array_items = ['nombre','correo','logged_in','telefono','direccion'];
        $session = session();
        $session->destroy();
        $session->remove($array_items);

        return redirect()->to(base_url('pagina/login'));
    }

    public function verCarrito(){

        $data['session']=$session = session();

        return view('pagina/topMenu',$data).
        view('pagina/verCarrito');
    }

    public function insertCarrito(){
         $session = session();
        $idProducto = $_POST['idProducto'];
        $nombre = $this->request->getPost('nombre');
        $cantidad = $this->request->getPost('cantidad');
        $costo = $this->request->getPost('costo');
        $subtotal = $cantidad*$costo;

        $carrito = $session->get('carrito')??[]; 
        $item = [
            "idProducto" =>$idProducto,
            "nombre" =>$nombre,
            "cantidad" =>$cantidad,
            "costo"=>$costo,
            "subtotal"=>$subtotal
        ];

        if (isset($carrito[$idProducto])) {
            $carrito[$idProducto]['cantidad']+=$cantidad;
            $carrito[$idProducto]['subtotal']=$carrito[$idProducto]['cantidad']*$costo;
        }else {
            $carrito[$idProducto] =$item;
        }
        $session->set('carrito',$carrito);

        return redirect()->to(base_url('/pagina/verCarrito'));
    }
    
}