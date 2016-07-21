$(document).ready(
    function()
    {
        var signUp = $("#signUp");
        var loginForm = $("#login");
        var register = $("#register");
        var createAcc = $("#createAccount");

        register.hide();


        signUp.click(
            function(){
                loginForm.hide();
                register.show();
            }
        );

        createAcc.click(
            function(){
                register.hide();
                loginForm.show();
            }
        );
    }
);