<html>
    <head>
        <?= $head_view; ?>
    </head>
    <body>
        <div class="container main_body_container">
            <nav class="navbar navbar-inverse no-margin-bottom">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <?php if ($this->session->has_userdata("username")) { ?>
                            <span class="navbar-brand">
                                Καλώς ήρθατε, <?= $this->session->userdata("first_name"); ?>!
                            </span>
                            <a class="navbar-brand" href="#" id="submit_logout">(Έξοδος)</a>
                        <?php } else { ?>

                        <?php } ?>
                    </div>
                    <div id="navbar" class="collapse navbar-collapse pull-right">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="/dashboard">Αρχική</a></li>
                            <li><a data-toggle="modal" data-target="#information_modal" class="information_modal_toggler">Πληροφορίες</a></li>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </nav>
            <div class="container main_content_container">
                <div class="row">
                    <?= $header_view; ?>
                </div>
                <div class="row">
                    <?= $content_view; ?>
                </div>
                <div class="row">
                    <?= $side_view; ?>
                </div>
                <div class="row">
                    <?= $footer_view; ?>
                </div>
                <div class="row">
                    <?= $foot_view; ?>
                </div>
            </div>
        </div>
        <div class="modal fade" tabindex="-1" role="dialog" id="information_modal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Πληροφορίες για την εργασία</h4>
                    </div>
                    <div class="modal-body">
                        <p>Σκοπός της πτυχιακής αυτής εργασίας, ήταν η ανάπτυξη μίας διαδικτυακής εφαρμογής η οποία θα πραγματοποιεί την διαχείριση ενός μεσιτικού γραφείου. To περιβάλλον ανάπτυξης PHP – SQL, με στόχο την καλύτερη διαχείριση αλλά και οργάνωση όλων των διαθέσιμων στοιχείων του μεσιτικού γραφείου.</p>
                        <p>Συγκεκριμένα, μελετήθηκε η διαδικτυακή  προσέγγιση στο περιβάλλον της αγοράς ακινήτων, αποτελεί αναμφισβήτητα μια πολύτιμη προσέγγιση, η οποία αποτελέσει το έναυσμα για τη δημιουργία μιας ολοκληρωμένης εφαρμογής, από ένα αρμόδιο δημόσιο οργανισμό. </p>
                        <p>Οι συνεχώς αυξανόμενες απαιτήσεις της ψηφιακής εποχής, καθιστούν επιτακτική τη δημιουργία εφαρμογής, η οποία θα είναι προσανατολισμένη στην διαχείριση των μεσιτικών γραφείων και θα αποσκοπεί στην υποστήριξη της ανάπτυξης της αγοράς.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script>
        $("body").off("click", "#submit_logout").on("click", "#submit_logout", function () {
            $.ajax({
                type: "post",
                url: "/login/logout_auth"
            }).done(function (data) {
                window.location.href = "/";
            });
        });
    </script>
</html>