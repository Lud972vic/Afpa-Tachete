<?php


class EmployeesProductsCustomersDate extends Controller
{
    public function page($id)
    {
        $this->loadModel("EmployeeProductCustomerDate");
        $data = $this->EmployeeProductCustomerDate->index($id);

        $table = "employeesproductscustomersdate";
        $employeesproductscustomersdate = $data[0];
        $currentPage = $data[1];
        $pages = $data[2];

        $this->render('index', compact('table', 'employeesproductscustomersdate', 'currentPage', 'pages'));
    }
}
