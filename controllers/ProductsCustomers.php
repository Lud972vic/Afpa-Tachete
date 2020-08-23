<?php


class ProductsCustomers extends Controller
{
    public function page($id)
    {
        $this->loadModel("ProductCustomer");
        $data = $this->ProductCustomer->index($id);

        $table = "productscustomers";
        $productscustomers = $data[0];
        $currentPage = $data[1];
        $pages = $data[2];

        $filtres = $this->ProductCustomer->listeFiltre();

        $this->render('index', compact('table', 'productscustomers', 'filtres', 'currentPage', 'pages'));
    }
}
