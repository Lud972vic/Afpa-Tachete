<?php


class EmployeesProductsCustomersCity extends Controller
{
    public function page($id)
    {
        $this->loadModel("EmployeeProductCustomerCity");
        $data = $this->EmployeeProductCustomerCity->index($id);

        $table = "employeesproductscustomerscity";
        $employeeproductcustomercity = $data[0];
        $currentPage = $data[1];
        $pages = $data[2];

        $filtres = $this->EmployeeProductCustomerCity->listeFiltre();

        //On passe un tableau de data $employees, $currentPage, $pages
        $this->render('index', compact('table', 'employeeproductcustomercity', 'filtres', 'currentPage', 'pages'));
    }
}
