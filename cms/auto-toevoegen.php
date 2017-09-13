<?php


function autoToevoegen() {
	?>
<h3>Auto toevoegen</h3>

    <form class="form-signin" method="post" title="signin">

        <div class="form-group col-xs-6">
            <label for="usr">Type:</label>
            <input type="text" class="form-control" name="txt_stnumber" title="signin">
        </div>
        <div class="form-group col-xs-6">
            <label for="usr">Kleur:</label>
            <input type="text" class="form-control" name="txt_stname"
                   title="signin" required>
        </div>
        <div class="form-group col-xs-6">
            <label for="usr">Bouwjaar:</label>
            <input type="text" class="form-control" name="txt_stprefix"
                   title="signin">
        </div>
        <div class="form-group col-xs-6">
            <label for="usr">Merk:</label>
            <input type="text" class="form-control" name="txt_stlastname"
                   title="signin" required>
        </div>
        <div class="form-group col-xs-6">
            <label for="usr">Zitplaatsen:</label>
            <input type="EMAIL" class="form-control" name="txt_stmail"
                   title="signin" required>
        </div>
        <div class="form-group col-xs-6">
            <label for="usr">Prijs:</label>
            <input type="number" class="form-control" name="txt_stmobile"
                   title="signin" required>
        </div>
        <div class="form-group col-xs-6">
            <label for="usr">Locatie:</label>
            <input type="number" class="form-control" name="txt_stmobile"
                   title="signin" required>
        </div>
        <div class="form-group col-xs-6">
            <label for="usr">Nummerbord:</label>
            <input type="number" class="form-control" name="txt_stmobile"
                   title="signin" required>
        </div>
        <div class="modal-footer">
            <a class="btn btn-default" href="stWijzigen.php">Annuleren</a>
            <input type="submit" class="btn btn-primary" name="wijzigen" value="Wijzig"/>
        </div>
    </form>

	<?php
}

?>