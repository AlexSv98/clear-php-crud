<?php

class ControllerMain extends Controller {

    public function actionIndex()
    {
        $data = [];
        $model = new TableModel();
        $result = $model->getAll();
        $num = $result->rowCount();
        //перевіряємо чи є працівники
        if ($num > 0) {
            //массив працівників
            $data['workers_arr'] = array();

            //перебериаем $result
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                extract($row);

                $worker_data = array(
                    'name' => $name,
                    'age' => $age,
                    'salary' => html_entity_decode($salary),
                    'id' => $id
                );

                //push'им в 'data'
                array_push($data['workers_arr'], $worker_data);
            }
        } else {
            //немає працівників
            echo 'Workers not found';
        }
        //передаём имена файлов общего шаблона и вида c контентом
        $this->view->generate('main.php', 'template_view.php', $data);
    }

    public function actionAdd()
    {
        $data = [];
        $this->view->generate('add.php', 'template_view.php', $data);
    }

    public function actionInsert()
    {
        var_dump($_POST);

        $name = isset($_POST['salary']) ? $_POST['name'] : NULL;
        $age = isset($_POST['age']) ? $_POST['age'] : NULL;
        $salary = isset($_POST['name']) ? $_POST['salary'] : NULL;

        $model = new TableModel();
        $model->insertWorkers($name,$age,$salary);
        header('Location:/');
    }

    public function actionEdit()
    {
        $data = [];
        $id = isset($_GET['id']) ? $_GET['id'] : NULL;
        $model = new TableModel();
        $result = $model->findById($id);
        $num = $result->rowCount();
        //перевіряємо чи є працівники
        if ($num > 0) {
            //массив працівників
            $data['workers_arr'] = array();

            //перебериаем $result
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                extract($row);

                $worker_data = array(
                    'name' => $name,
                    'age' => $age,
                    'salary' => html_entity_decode($salary),
                    'id' => $id
                );

                //push'им в 'data'
                array_push($data['workers_arr'], $worker_data);
            }
        } else {
            //немає працівників
            echo 'Workers not found';
        }

        $this->view->generate('edit.php', 'template_view.php', $data);
    }

    public function actionUpdate()
    {

        $id = isset($_POST['workerId']) ? $_POST['workerId'] : NULL;
        $name = isset($_POST['salary']) ? $_POST['name'] : NULL;
        $age = isset($_POST['age']) ? $_POST['age'] : NULL;
        $salary = isset($_POST['name']) ? $_POST['salary'] : NULL;

        $model = new TableModel();
        $model->updateWorkers($id,$name,$age,$salary);
        header('Location:/');
    }

    public function actionDelete()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : NULL;
        $model = new TableModel();
        $model->deleteWorkers($id);
        header('Location:/');
    }

}
