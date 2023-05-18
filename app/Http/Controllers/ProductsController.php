<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\ProductType;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    protected $model;

    protected $view  = "products";
    protected $route = "products";
    protected $title = "Products List";

    public function __construct(Products $products, ProductType $productType)
    {
        $this->model = $products;
    }

    public function index()
    {
        # TÍTULO DA PÁGINA
        $title = $this->title;

        #DADOS DO MODEL
        $data = $this->model
            ->where("deleted_at", "=", null)
            ->orderBy('id', 'asc')
            ->paginate(12);

        var_dump($data);

        # CARREGA A VIEW PASSANDO OS PARAMETROS DA PÁGINA
        return view($this->view . '/index', compact('data', 'title'));
    }

    public function create()
    {
        $title = "Cadastrar {$this->title}";

        $data = $this->model
            ->where("deleted_at", "=", null);

        return view($this->view . '/create-edit', compact( 'title', 'data'));
    }

    public function update($request, $id)
    {

    }

    public function store($request)
    {
        $dataForm = $request->all();

        # AJUSTA O STATUS PARA PODER ATUALIZAR NO BANCO
        $dataForm['status'] = isset($dataForm['status']) ? 1 : 0;


        if ($this->upload && $request->hasFile($this->upload['name'])) {

            $image = $request->file($this->upload['name']);

            $nameFile = uniqid(date('YmdHis')) . '.' . $image->getClientOriginalExtension();

            $upload = $image->storeAs($this->upload['path'], $nameFile);

            if ($upload) {
                $dataForm[$this->upload['name']] = $nameFile;
            } else {
                return redirect()
                    ->route("{$this->route}.create")
                    ->withErrors(['errors' => 'Erro no Upload!'])
                    ->withInput();
            }

        }

        $insert = $this->model->create($dataForm);

        if ($insert)
            return redirect()
                ->route("{$this->route}.index")
                ->with(['success' => 'Cadastro realizado com sucesso!']);
        else
            return redirect()->route("{$this->route}.create")
                ->withErrors(['errors' => 'Falha ao cadastrar!'])
                ->withInput();


    }
}
