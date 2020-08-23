<?php


class Products extends Controller
{
    public function page($id)
    {
        $this->loadModel("Product");
        $data = $this->Product->index($id);

        $table = "products";
        $products = $data[0];
        $currentPage = $data[1];
        $pages = $data[2];

        //On passe un tableau de data $employees, $currentPage, $pages
        $this->render('index', compact('table', 'products', 'currentPage', 'pages'));
    }

    public function update($id)
    {
        $this->loadModel("Product");
        $products = $this->Product->update($id);
        $this->render('update', compact('products'));
    }

    /*public function save($nouveauprix, $id)
        {
            $this->loadModel("Product");
            $products = $this->Product->save($nouveauprix, $id);
            $this->render('save', compact('products'));
        }*/

    public function save()
    {
        $this->loadModel("Product");
        $products = $this->Product->save();
        $this->render('save', compact('products'));
    }
}
