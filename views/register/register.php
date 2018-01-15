<?php 
$PageTitle = "Register";

function ScriptsAndStyles(){ ?>

<script src='register.js'></script>

<?php }

include_once('../components/header.php');?>

<div class="container">
  <div class="bg-faded p-4 my-4">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Create User Account
            </h1>
        </div>
        <div id="panelRegistration" class="panel panel-default">
          <div class="panel-body">
              <div id="panelRegistrationContainer" class="container">
                <div class="row">
                    <form id="registrationForm" role="form" action="../../api/register.php" method="post" data-toggle="validator" autocomplete="off">
                        <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="inputName has-feedback">Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="inputName" id="inputName" placeholder="..." required>
                                        <span class="input-group-addon"><span class="glyphicon form-control-feedback" aria-hidden="true"></span>&nbsp;&nbsp;</span>
                                    </div><div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <label for="inputMiddleName">Middle Name</label>
                                    <div class="input-group">
                                        <input type="text" size="100" class="form-control" id="inputMiddleName" name="inputMiddleName" placeholder="..." >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputSurname">Surname</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="inputSurname" name="inputSurname" placeholder="..." required>
                                        <span class="input-group-addon"><span class="glyphicon form-control-feedback" aria-hidden="true"></span>&nbsp;&nbsp;</span>
                                    </div><div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail">E-mail</label>
                                    <div class="input-group">
                                        <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="voorbeeld@groenevingers.nl" data-error="Invalid email adress." required>
                                        <span class="input-group-addon"><span class="glyphicon form-control-feedback" aria-hidden="true"></span>&nbsp;&nbsp;</span>
                                    </div><div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPhoneNumber">Telephone Number</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control"  name="inputPhoneNumber" placeholder="06 333 333 33" required>
                                        <span class="input-group-addon"><span class="glyphicon form-control-feedback" aria-hidden="true"></span>&nbsp;&nbsp;</span>
                                    </div><div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword">Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" name="inputPassword" id="inputPassword"  data-toggle="popover" data-trigger="hover" data-content="Test" required>
                                        <span class="input-group-addon"><span class="glyphicon form-control-feedback" aria-hidden="true"></span>&nbsp;&nbsp;</span>
                                    </div><div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="password" class="form-control" data-match="#inputPassword" data-match-error="Password does not match." required>
                                        <span class="input-group-addon"><span class="glyphicon form-control-feedback" aria-hidden="true"></span>&nbsp;&nbsp;</span>
                                    </div><div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info pull-right">
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


<?php include_once('../components/footer.php');?>
