
        <div id="PopUpOverlay" onclick="closeNav()"></div>
        
        <div id="loginPopUp" class="containerPopUp">
            <div id="logInPopUpPadding">
                <h1>User Log In</h1>
                <a href="userRegistration.php">Don't have an account yet?</a><a href="#">Forgot Password?</a>
                <form action="checkLogin.php" method="post">
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
                        <input  value="kazikwaraksa@hotmail.com" type="text" class="form-control" name="username" placeholder="Username" aria-describedby="basic-addon1" required>
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
                        <input value="123qwe" type="password" class="form-control" name="password" placeholder="Password"  aria-describedby="basic-addon1" required>
                    </div>
                    <br>
                    <input id="btnSubmitLogIn" type="submit" class="btn btn-default btn-lg col-md-6" value="Submit">
                </form>
            </div>
        </div>
        
        <footer class="bg-faded text-center py-3">
            <div class="container">
              <p class="m-0">Copyright &copy; Festum 2017</p>
            </div>
        </footer>
  </body>
</html>