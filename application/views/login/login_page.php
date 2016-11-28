<div class="row margin-bottom-30" style="margin-bottom:150px;">
</div>
<div class="row margin-bottom-30">
    <div class="col-md-4"></div>
    <div class="col-md-4 centered-div">
        <input type="text" id="username" class="form-control" placeholder="E-mail χρήστη">
    </div>
    <div class="col-md-4"></div>
</div>
<div class="row margin-bottom-30">
    <div class="col-md-4"></div>
    <div class="col-md-4 centered-div">
        <input type="password" id="password" class="form-control" placeholder="Κωδικός χρήστη">        
    </div>
    <div class="col-md-4"></div>
</div>
<div class="row margin-bottom-30">
    <div class="col-md-4"></div>
    <div class="col-md-4 centered-div">
        <button type="submit" id="submit_login" class="btn btn-primary">Είσοδος στο σύστημα</button>
    </div>
    <div class="col-md-4"></div>
</div>
<script>
    
    $(function() {
        $("#submit_login").popover({
            content: "Λανθασμένο όνομα χρήστη ή κωδικός πρόσβασης! Παρακαλούμε προσπαθήστε ξανά!",
            placement: "top",
            title: "Σφάλμα!",
            trigger: "manual"
        });
        
        $("body").off("click", ".popover").on("click", ".popover", function() {
            $('#submit_login').popover('hide');
        })
        
        $("body").off("click", "#submit_login").on("click", "#submit_login", function () {
            $.ajax({
                type: "post",
                url: "/login/login_auth",
                data: {
                    username: $("#username").val(),
                    password: $("#password").val()
                }
            }).done(function (data) {
                $("#password").val("");
                console.log(data);
                if (data == 1) {
                    window.location.href = "/dashboard";
                } else {
                    $("#submit_login").popover("show");
                    setTimeout(function() {
                        $('#submit_login').popover('hide');
                    }, 4000);
                }
            });
        });
    });
    
</script>