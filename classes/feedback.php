<?php

function succes()
{
    ?>

    <div class="alert alert-success alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>Success!</strong> Het is succesvol doorgevoerd en opgeslagen!
    </div>

    <?php
}

function failed()
{
    ?>

    <div class="alert alert-danger alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>OEPS!</strong> Er is een fout opgetreden. Mogelijk dubellen gegevens ingevuld of er is een probleem met de
        verbinding. Probeer het opnieuw!
    </div>

    <?php
}

?>