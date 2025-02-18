<?php
    require_once "Models/UsersModel.php";
    class UsersController extends BaseController{
        private $users;
    
        public function __construct()
        {
            $this->users = new UsersModel();
        }

        public function index()
        {
            // print_r("Hello");
            $result = $this->users->getUsers();
            $this->view('users/users', ['users' => $result]);
        }

        public function create()
        {
            $this->view('users/create');
        }

        public function store() {
            $username = $_POST['username'];
            $password = $_POST['pswd'];
            $email = $_POST['email'];
            $passwordEnypt = password_hash($password, PASSWORD_BCRYPT);
            // echo $passwordEnypt; die;
            $this->users->addUser($username, $passwordEnypt, $email);
            $this->redirect('/users');
        }
        public function edit($id)
        {
            
            $result = $this->users->getUserById($id);
            $this->view('users/edit', ['user' => $result]);
        }
    
        /**
         * Updates an existing product in the database.
         */
        public function update($id)
        {
            $username = $_POST['username'];
            $password = $_POST['pswd'];
            $email = $_POST['email'];
            $passwordEnypt = password_hash($password, PASSWORD_BCRYPT);
            $this->users->updateUser($id, $username, $passwordEnypt, $email);
            $this->redirect('/users');
        }
    
        /**
         * Deletes a product from the database.
         */
        public function destroy($id)
        {
            $this->users->deleteUser($id);
            $this->redirect('/users');
        }
    }
?>