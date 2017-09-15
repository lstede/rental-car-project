<?php
session_start();
include_once( '../functions/functionsCMS.php' );
include_once( '../classes/fresh/user.php' );
include_once( '../classes/fresh/input.php' );
include_once( '../classes/fresh/validate.php' );
headerHtml();


$user = new user();
$user->checkLogin('cms');
$validateRegister = new validate();

/*$columns = array(
    'userPhoneNumber' => 1,
    'userEmail' => "test",
    'userFirstName' => "test",
    'userLastName'=> "test",
    'userName' => "test",
    'userPassword' => "test",
    'userAdmin' => 1);

$user->query("update","users", $columns);*/

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
            'userLastName'=> input::get('surnameRegister'),
            'userName' => input::get('usernameRegister'),
            'userPassword' => $hashPassword,
            'userAdmin' => $rights);

        $user->addUser('users',$columns);
        $_POST = array();
    }


}


?>
    <div class="row">
        <!-- uncomment code for absolute positioning tweek see top comment in css -->
        <!-- <div class="absolute-wrapper"> </div> -->
        <!-- Menu -->
        <?php
        sidemenu();
        ?>

        <!-- Main Content -->
        <div class="container-fluid">
            <div class="side-body">
                <h1> Alle gebruikers </h1>
                <button type="button" class="btn btn-outline-dark glyphicon glyphicon-plus" data-toggle="modal" data-target="#addUserModal"></button>
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
                        </tr>
                        </thead>
                        <tbody>

                        <tr>
                            <?php
                            //print_r($user->results);
                            //print_r($user->results);
                            $count = 1;
                            $table = 'users';
                            foreach ($user->getAllUsers($table) as $singleRowData) {
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
                                   value="<?php  echo input::get('nameRegister'); ?>">
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
                            <select name="rightsRegister">
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

<?php

footer();
if(isset($_GET['edit'])) {
    ?>   <script>alert; $('#addUserModal').modal('show');</script> <?php
}
