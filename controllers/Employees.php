<?php

class Employees extends Controller
{
    public function page($id)
    {
        $this->loadModel("Employee");
        $data = $this->Employee->index($id);

        $table = "employees";
        $employees = $data[0];
        $currentPage = $data[1];
        $pages = $data[2];

        //On passe un tableau de data $employees, $currentPage, $pages
        $this->render('index', compact('table', 'employees', 'currentPage', 'pages'));
    }

    public function detail($id)
    {
        echo "A finir, voir les détailles de l'employé n°" . $id;
    }
}
