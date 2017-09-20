<?php
session_start();
require_once('../functions/functionsCMS.php');
include_once('../classes/fresh/cars.php');
include_once('../classes/fresh/user.php');
include_once('../classes/fresh/validate.php');
include_once('../classes/fresh/input.php');
require_once('auto-toevoegen.php');
require('upload.php');


headerHtml();

$car = new cars();
$user = new user();
$validateRegister = new validate();
$user->checkLogin('cms');


?>
<!DOCTYPE html>
<html>


<body>


<div class="row">
    <!-- uncomment code for absolute positioning tweek see top comment in css -->
    <!-- <div class="absolute-wrapper"> </div> -->
    <!-- Menu -->
    <?php sidemenu(); ?>

    <div class="container-fluid">
        <div class="side-body">
            <h1> Alle gebruikers </h1>

            <button type="button" class="btn btn-outline-dark glyphicon glyphicon-plus" data-toggle="modal"
                    data-target="#addCarModal"></button>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Nummer</th>
                        <th>Naam</th>
                        <th>Bouwjaar</th>
                        <th>Zit plaatsen</th>
                        <th>Afbeelding</th>
                        <th>Prijs per dag</th>
                        <th>Kleur</th>
                        <th>Status</th>
                        <th>Type motor</th>
                        <th>Merk</th>
                        <th>Acties</th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr>
                        <?php
                        //print_r($user->results);
                        //print_r($user->results);
                        $count = 1;

                        foreach ($car->getAllCars() as $singleRowData) {
                            echo "<tr>";
                            foreach ($singleRowData as $singleRow => $singleData) {
                                echo "<td>";
                                if ($singleRow == "carId") {
                                    echo $count;
                                } else {
                                    echo $singleData;
                                }

                                echo "</td>";
                            }
                            echo "<td>
                                        <a class='' href='?edit=" . $singleRowData['carId'] . "'>
                                            <button class='btn btn-default glyphicon glyphicon-pencil'></button>
                                        </a>
                                           <a class='' href='?delete=" . $singleRowData['carId'] . "'>
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

<div class="modal fade" id="addCarModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Auto toevoegen</h4>
            </div>

            <div class="modal-body">
                <form id="register-form-admin"
                      method="post" role="form">
                    <div class="form-group">
                        Auto naam: <span
                                style="color: red;"><?php echo $validateRegister->showErrors('carNameRegister') ?></span>
                        <input type="text" name="carNameRegister" id="name" tabindex="1"
                               class="form-control" placeholder="Auto naam" required
                               value="<?php echo input::get('carNameRegister'); ?>">
                    </div>
                    <div class="form-group">
                        Bouwjaar: <span
                                style="color: red;"><?php echo $validateRegister->showErrors('buildRegister') ?></span>
                        <input type="text" name="buildRegister" id="surname" tabindex="1"
                               class="form-control" placeholder="Achternaam" required
                               value="<?php echo input::get('buildRegister'); ?>">
                    </div>
                    <div class="form-group">
                        Zitplaatsen: <span
                                style="color: red;"><?php echo $validateRegister->showErrors('seatsRegister') ?></span>
                        <input type="number" name="seatsRegister" id="email" tabindex="1"
                               class="form-control" placeholder="Zitplaatsen" required
                               value="<?php echo input::get('seatsRegister'); ?>">
                    </div>
                    <div class="form-group">
                        Afbeelding: <span
                                style="color: red;"><?php echo $validateRegister->showErrors('phoneRegister') ?></span>
                        <input type="text" name="imageRegister" id="email" tabindex="1"
                               class="form-control" placeholder="phone" required
                               value="<?php echo input::get('phoneRegister'); ?>">
                    </div>
                    <div class="form-group">
                        Prijs per dag: <span
                                style="color: red;"><?php echo $validateRegister->showErrors('priceRegister') ?></span>
                        <input type="number" name="priceRegister" id="username" tabindex="1"
                               class="form-control" placeholder="Prijs per dag" required
                               value="<?php echo input::get('priceRegister'); ?>">
                    </div>
                    <div class="form-group">
                        Kleur:
                        <select id="rights" name="colorRegister">
                            <?php
                            foreach ($car->getOptions()['color'] as $options) {

                                echo "<option value='" . $options['carColorId'] . "'>" . $options['carColorName'] . "</option>";

                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        Status:
                        <select id="rights" name="statusRegister">
                            <?php
                            foreach ($car->getOptions()['status'] as $options) {

                                echo "<option value='" . $options['carStatusId'] . "'>" . $options['carStatusName'] . "</option>";

                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        Type motor
                        <select id="rights" name="typeRegister">
                            <?php
                            foreach ($car->getOptions()['types'] as $options) {

                                echo "<option value='" . $options['carTypesId'] . "'>" . $options['carTypesName'] . "</option>";

                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        Merk
                        <select id="rights" name="brandRegister">
                            <?php
                            foreach ($car->getOptions()['brands'] as $options) {

                                echo "<option value='" . $options['carBrandsId'] . "'>" . $options['carBrandsName'] . "</option>";

                            }
                            ?>
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


</body>
</html>
<?php
footer();
?>
