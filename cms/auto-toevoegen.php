<?php

function autoToevoegen() {
	?>
<h3>Auto toevoegen</h3>

    <form class="form-signin" role="form" method="POST" title="signin">

        <div class="form-group col-md-6">
            <label for="usr">Type:</label>
            <input type="text" class="form-control" name="txt_carType" title="signin">
        </div>
        <div class="form-group col-md-6">
            <label for="usr">Kleur:</label>
            <input type="text" class="form-control" name="txt_carColor" title="signin">
        </div>
        <div class="form-group col-md-6">
            <label for="usr">Bouwjaar:</label>
            <input type="text" class="form-control" name="txt_carAge" title="signin">
        </div>
        <div class="form-group col-md-6">
            <label for="usr">Merk:</label>
            <input type="text" class="form-control" name="txt_carBrand" title="signin" >
        </div>
        <div class="form-group col-md-6">
            <label for="usr">Zitplaatsen:</label>
            <input type="text" class="form-control" name="txt_carSeats" title="signin" >
        </div>
        <div class="form-group col-md-6">
            <label for="usr">Prijs:</label>
            <input type="text" class="form-control" name="txt_carPrice" title="signin" >
        </div>
        <div class="form-group col-md-6">
            <label for="usr">Locatie:</label>
            <input type="text" class="form-control" name="txt_carLoc" title="signin" >
        </div>
        <div class="form-group col-md-6">
            <label for="usr">Nummerbord:</label>
            <input type="text" class="form-control" name="txt_carPlate" title="signin" >
        </div>
        <div class="modal-footer">
            <a class="btn btn-default" href="#">Annuleren</a>
            <input type="submit" class="btn btn-primary" name="auto-toevoegen" value="Wijzig"/>
        </div>
    </form>


	<?php
}

