<?php
session_start();
include_once('../../functions/functionsCMS.php');
include_once('../../classes/fresh/user.php');
include_once('../../classes/fresh/input.php');
include_once('../../classes/fresh/validate.php');
headerHtml();


$idValid = false;
$idValidDelete = false;
$updated = false;

$user = new user();
$user->checkLogin('cms');
$validateRegister = new validate();


if (isset($_POST['register-submit'])) {


    $data = array(
        'usernameRegister' => array(
            'required' => true,
            'min' => '4',
            'max' => '15'
        ),
        'phoneRegister' => array(
            'required' => true,
            'min' => '10',
            'max' => '10'
        ),
        'emailRegister' => array(
            'required' => true,
            'min' => '5',
            'max' => '254'
        ),
        'nameRegister' => array(
            'required' => true,
            'min' => '2',
            'max' => '35'
        ),
        'surnameRegister' => array(
            'required' => true,
            'min' => '2',
            'max' => '35'
        ),
        'passwordRegister' => array(
            'required' => true,
            'min' => '8',
            'max' => '32',
        ),
        'confirm-passwordRegister' => array(
            'required' => true,
            'match' => 'passwordRegister'
        ));


    if ($validateRegister->validateInfo($data)) {

        $hashPassword = $user->md5(input::get('passwordRegister'));
        $rights = (input::get('rightsRegister') == "admin") ? 1 : 0;

        $columns = array(
            'userPhoneNumber' => input::get('phoneRegister'),
            'userEmail' => input::get('emailRegister'),
            'userFirstName' => input::get('nameRegister'),
            'userLastName' => input::get('surnameRegister'),
            'userName' => input::get('usernameRegister'),
            'userPassword' => $hashPassword,
            'userAdmin' => $rights);

        if($user->addUser('users', $columns)) {
            $updated = true;
        }
        $_POST = array();
    }


}
$userId = input::get('edit');

if (isset($_POST['update'])) {
    $data = array(
        'usernameRegister' => array(
            'required' => true,
            'min' => '4',
            'max' => '15'
        ),
        'phoneRegister' => array(
            'required' => true,
            'min' => '10',
            'max' => '10'
        ),
        'emailRegister' => array(
            'required' => true,
            'min' => '5',
            'max' => '254'
        ),
        'nameRegister' => array(
            'required' => true,
            'min' => '2',
            'max' => '35'
        ),
        'surnameRegister' => array(
            'required' => true,
            'min' => '2',
            'max' => '35'
        ),
        'passwordRegister' => array(
            'required' => true,
            'min' => '8',
            'max' => '32',
        ),
        'confirm-passwordRegister' => array(
            'required' => true,
            'match' => 'passwordRegister'
        ));


    if ($validateRegister->validateInfo($data)) {

        $hashPassword = $user->md5(input::get('passwordRegister'));
        $rights = (input::get('rightsRegister') == "admin") ? 1 : 0;

        $columns = array(
            'userPhoneNumber' => input::get('phoneRegister'),
            'userEmail' => input::get('emailRegister'),
            'userFirstName' => input::get('nameRegister'),
            'userLastName' => input::get('surnameRegister'),
            'userName' => input::get('usernameRegister'),
            'userPassword' => $hashPassword,
            'userAdmin' => $rights);

        $extraOptions = array("userId" => $_GET['edit']);

        $user->editUser("users", $columns, $extraOptions);

        $updated = true;


    }
}

if (isset($_GET['edit'])) {
    $dataUser = null;
    if ($user->getUser($_GET['edit'])) {
        $dataUser = $user->getUser($_GET['edit'])[0];
    }



    if ($dataUser) {
        $idValid = true;
        $_POST['nameRegister'] = $dataUser['userFirstName'];
        $_POST['surnameRegister'] = $dataUser['userLastName'];
        $_POST['emailRegister'] = $dataUser['userEmail'];
        $_POST['phoneRegister'] = $dataUser['userPhoneNumber'];
        $_POST['usernameRegister'] = $dataUser['userName'];
        $_POST['passwordRegister'] = "";
        $_POST['confirm-passwordRegister'] = "";
    }
}

if (isset($_GET['delete'])) {
    if ($user->getUser($_GET['delete'])) {
        $idValidDelete = true;
    }

    if (isset($_POST['delete-submit']) && $idValidDelete) {
        $extraOptions = array('userId' => $_GET['delete']);
        if($user->deleteUser($extraOptions)){
            $updated = true;
        }
    }
}


?>
    <div class="row">
        <!-- uncomment code for absolute positioning tweek see top comment in css -->
        <!-- <div class="absolute-wrapper"> </div> -->
        <!-- Menu -->
        <div class="side-menu">

            <nav class="navbar navbar-default" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <div class="brand-wrapper">
                        <!-- Hamburger -->
                        <button type="button" class="navbar-toggle">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <!-- Brand -->
                        <div class="brand-name-wrapper">
                            <a class="navbar-brand" href="#">
                                Brand
                            </a>
                        </div>

                        <!-- Search -->
                        <a data-toggle="collapse" href="#search" class="btn btn-default" id="search-trigger">
                            <span class="glyphicon glyphicon-search"></span>
                        </a>

                        <!-- Search body -->
                        <div id="search" class="panel-collapse collapse">
                            <div class="panel-body">
                                <form class="navbar-form" role="search">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Search">
                                    </div>
                                    <button type="submit" class="btn btn-default "><span
                                                class="glyphicon glyphicon-ok"></span></button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Main Menu -->
                <div class="side-menu-container">
                    <ul class="nav navbar-nav">

                        <li><a href="#"><span class="glyphicon glyphicon-send"></span> Link</a></li>
                        <li class="active"><a href="#"><span class="glyphicon glyphicon-plane"></span> Active
                                Link</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-cloud"></span> Link</a></li>

                        <!-- Dropdown-->
                        <li class="panel panel-default" id="dropdown">
                            <a data-toggle="collapse" href="#dropdown-lvl1">
                                <span class="glyphicon glyphicon-user"></span> Sub Level <span class="caret"></span>
                            </a>

                            <!-- Dropdown level 1 -->
                            <div id="dropdown-lvl1" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul class="nav navbar-nav">
                                        <li><a href="#">Link</a></li>
                                        <li><a href="#">Link</a></li>
                                        <li><a href="#">Link</a></li>

                                        <!-- Dropdown level 2 -->
                                        <li class="panel panel-default" id="dropdown">
                                            <a data-toggle="collapse" href="#dropdown-lvl2">
                                                <span class="glyphicon glyphicon-off"></span> Sub Level <span
                                                        class="caret"></span>
                                            </a>
                                            <div id="dropdown-lvl2" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <ul class="nav navbar-nav">
                                                        <li><a href="#">Link</a></li>
                                                        <li><a href="#">Link</a></li>
                                                        <li><a href="#">Link</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>

                        <li><a href="#"><span class="glyphicon glyphicon-signal"></span> Link</a></li>

                    </ul>
                </div><!-- /.navbar-collapse -->
            </nav>

        </div>

        <!-- Main Content -->
        <div class="container-fluid">
            <div class="side-body">
                <h1> Alle gebruikers </h1>
                <button type="button" class="btn btn-outline-dark glyphicon glyphicon-plus" data-toggle="modal"
                        data-target="#addUserModal"></button>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Nummer</th>
                            <th>Voornaam</th>
                            <th>Achternaam</th>
                            <th>Email</th>
                            <th>Gebruikersnaam</th>
                            <th>Telefoonnummer</th>
                            <th>Wachtwoord</th>
                            <th>Rechten</th>
                            <th>Acties</th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr>
                            <?php
                            //print_r($user->results);
                            //print_r($user->results);
                            $count = 1;

                            foreach ($user->getAllUsers() as $singleRowData) {
                                echo "<tr>";
                                foreach ($singleRowData as $singleRow => $singleData) {
                                    echo "<td>";
                                    if ($singleRow == 'userPassword') {
                                        echo "******";

                                    } elseif ($singleRow == 'userAdmin') {
                                        if ($singleData == 1) {
                                            echo "Beheerder";
                                        } else {
                                            echo "Gebruiker";
                                        }
                                    } elseif ($singleRow == "userId") {
                                        echo $count;
                                    } else {
                                        echo $singleData;
                                    }

                                    echo "</td>";
                                }
                                echo "<td>
                                        <a class='' href='?edit=" . $singleRowData['userId'] . "'>
                                            <button class='btn btn-default glyphicon glyphicon-pencil'></button>
                                        </a>
                                           <a class='' href='?delete=" . $singleRowData['userId'] . "'>
                                            <button class='btn btn-default glyphicon glyphicon-trash'></button>
                                        </a>
                                     </td>";
                                echo "</tr>";
                                $count++;
                            }
                            ?>
                        </tr>

                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    </div>

    <div class="modal fade" id="addUserModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Gebruiker toevoegen</h4>
                </div>

                <div class="modal-body">
                    <form id="register-form-admin"
                          method="post" role="form">
                        <div class="form-group">
                            Voornaam: <span
                                    style="color: red;"><?php echo $validateRegister->showErrors('nameRegister') ?></span>
                            <input type="text" name="nameRegister" id="name" tabindex="1"
                                   class="form-control" placeholder="Voornaam" required
                                   value="<?php echo input::get('nameRegister'); ?>">
                        </div>
                        <div class="form-group">
                            Achternaam: <span
                                    style="color: red;"><?php echo $validateRegister->showErrors('surnameRegister') ?></span>
                            <input type="text" name="surnameRegister" id="surname" tabindex="1"
                                   class="form-control" placeholder="Achternaam" required
                                   value="<?php echo input::get('surnameRegister'); ?>">
                        </div>
                        <div class="form-group">
                            Email: <span
                                    style="color: red;"><?php echo $validateRegister->showErrors('emailRegister') ?></span>
                            <input type="email" name="emailRegister" id="email" tabindex="1"
                                   class="form-control" placeholder="Email" required
                                   value="<?php echo input::get('emailRegister'); ?>">
                        </div>
                        <div class="form-group">
                            Telefoon: <span
                                    style="color: red;"><?php echo $validateRegister->showErrors('phoneRegister') ?></span>
                            <input type="number" name="phoneRegister" id="email" tabindex="1"
                                   class="form-control" placeholder="phone" required
                                   value="<?php echo input::get('phoneRegister'); ?>">
                        </div>
                        <div class="form-group">
                            Gebruikersnaam: <span
                                    style="color: red;"><?php echo $validateRegister->showErrors('usernameRegister') ?></span>
                            <input type="text" name="usernameRegister" id="username" tabindex="1"
                                   class="form-control" placeholder="Gebruikersnaam" required
                                   value="<?php echo input::get('usernameRegister'); ?>">
                        </div>
                        <div class="form-group">
                            Wachtwoord: <span
                                    style="color: red;"><?php echo $validateRegister->showErrors('passwordRegister') ?></span>
                            <input type="password" name="passwordRegister" id="password"
                                   tabindex="2" required
                                   class="form-control">
                        </div>
                        <div class="form-group">
                            Herhaal Wachtwoord: <span
                                    style="color: red;"><?php echo $validateRegister->showErrors('confirm-passwordRegister') ?></span>
                            <input type="password" name="confirm-passwordRegister"
                                   id="confirm-password" required
                                   tabindex="2" class="form-control">
                        </div>

                        <div class="form-group">
                            Rechten
                            <select id="rights" name="rightsRegister">
                                <option value="user" id="">Gebruiker</option>
                                <option value="admin" id="">Beheerder</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6 col-sm-offset-3">
                                    <input type="submit" name="register-submit" id="register-submit"
                                           tabindex="4" class="form-control  btn-default btn"
                                           value="Registreer nu">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

    <!-- DELETE MODAL -->
    <div id="deleteModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Gebruiker verwijderen</h4>
                </div>
                <div class="modal-body">
                    <p>Weet u zeker dat u de gebruiker wilt verwijderen?</p>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6 col-sm-offset-3">
                                <form method="post">
                                    <input type="submit" name="delete-submit" id="register-submit"
                                           tabindex="4" class="form-control  btn-default btn"
                                           value="Gebruiker verwijderen">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

<?php

footer();

if(isset($_POST['register-submit']) && $updated === false) {
    ?>
    <script>
        $('#addUserModal').modal('show');
    </script>
    <?php
}

if ($idValid && $updated === false) {
    ?>
    <script>
        $('#addUserModal').modal('show');

        $('#rights').val(<?php echo($dataUser['userAdmin'] == 1 ? "'admin'" : "'user'"); ?>);

        $("#register-submit").attr('name', 'update');
        $("#register-submit").attr('value', 'Bijwerken');

        $('#addUserModal').on('hidden.bs.modal', function (e) {
            window.history.pushState({}, "Hide", "useroverview.php");
        })
    </script>;
    <?php
}

if ($idValidDelete && $updated === false) {
    ?>
    <script>
        $('#deleteModal').modal('show');
        $('#deleteModal').on('hidden.bs.modal', function (e) {
            window.history.pushState({}, "Hide", "useroverview.php");
        })
    </script> <?php
}
