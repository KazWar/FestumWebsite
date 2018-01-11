<?php require('navigation/header.php');
$userID = $_SESSION['userID'];?>

<div class="container">
  <div class="bg-faded p-4 my-4">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="page-header ">
                Delivery Address Page
            </h1>
            <p>Please fill in the fields to complete your purchase.</p>
        </div>
        <div id="panelRegistration" class="panel panel-default">
          <div class="panel-body">
              <div id="panelRegistrationContainer" class="container">
                <div class="row">
                    <form id="registrationForm" role="form" action="paymentPage.php.php?userID=<?php echo $userID ?>" method="post" autocomplete="off">
                        <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="inputCountry">Country</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="inputCountry" id="inputCountry" placeholder="..." required>
                                        <span class="input-group-addon"><span class="glyphicon form-control-feedback" aria-hidden="true"></span>&nbsp;&nbsp;</span>
                                    </div><div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <label for="inputCity has-feedback">City</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="inputCity" id="inputCity" placeholder="..." required>
                                        <span class="input-group-addon"><span class="glyphicon form-control-feedback" aria-hidden="true"></span>&nbsp;&nbsp;</span>
                                    </div><div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress">Address</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="inputAddress" name="inputAddress" placeholder="Streetname + nr" required>
                                        <span class="input-group-addon"><span class="glyphicon form-control-feedback" aria-hidden="true"></span>&nbsp;&nbsp;</span>
                                    </div><div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPostalCode">Postal Code</label>
                                    <div class="input-group">
                                        <input type="email" class="form-control" id="inputPostalCode" name="inputPostalCode" placeholder="1111AA" data-error="Invalid postcode" pattern="^[1-9][0-9]{3} ?(?!sa|sd|ss|SA|SD|SS)[A-Za-z]{2}$" required>
                                        <span class="input-group-addon"><span class="glyphicon form-control-feedback" aria-hidden="true"></span>&nbsp;&nbsp;</span>
                                    </div><div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info pull-right col-12">
                                </div>
                            </div>
                        </form>
                    </div>
                 </div>
              </div>
           </div>
        </div>
    </div>
</div>

<?php require('navigation/footer.php') ?>
