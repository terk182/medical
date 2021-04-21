<?php include('partials-front/menu.php'); ?>
<!-- end left sidebar -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- wrapper  -->
<!-- ============================================================== -->
<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">information </h2>

                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">index</a></li>


                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end pageheader -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- pricing - one -->
        <!-- ============================================================== -->
        <div>
            <div class="container">

                <!-- Full-width images with number text -->
                <div>

                    <img src="img_sl/Slide1.png" style="width:100%">
                    <div class="content">
                        <br>
                        <h1>Novum IQ Large Volume Pump</h1>
                        <p>The Novum IQ LVP is intended to be used for the controlled administration of fluids. These include parenteral pharmaceutical drugs, nutrition, blood and blood products.
                            The Novum IQ LVP is intended to deliver an infusion through clinically acceptable routes of administration: intravenous, arterial, subcutaneous, and epidural.
                            The Novum IQ LVP is intended to be used in conjunction with legally marketed and compatible intravenous administration sets, and medications provided by the user.
                            The Novum IQ LVP is suitable for patient care in hospitals and outpatient health care facilities.
                            The Novum IQ LVP is intended for use on adults, pediatrics and neonates.
                            The Novum IQ LVP is intended to aid in the reduction of operator interaction through guided programming, including a way to automate the programming of infusion parameters and documentation of infusion therapies. This automation is intended to aid in the reduction of programming errors.
                            The Novum IQ LVP is intended to be used by trained healthcare professionals.
                        </p>
                    </div>
                    <br>

                    <div>

                        <img src="img_sl/Slide2.png" style="width:100%">
                        <div class="content">
                            <br>
                            <h1>Novum IQ Syringe Pump</h1>
                            <p>The Novum IQ Syringe Infusion Pump is intended to be used for the controlled administration of fluids. These include parenteral pharmaceutical drugs, nutrition, blood and blood products, and enteral nutrition.
                                The Novum IQ Syringe Infusion Pump is intended to deliver an infusion through clinically accepted routes of administration: intravenous, arterial, enteral, and subcutaneous.
                                The Novum IQ Syringe Infusion Pump is intended to be used in conjunction with legally marketed and compatible administration sets, syringes, and medications provided by the user.
                                The Novum IQ Syringe Infusion Pump is suitable for patient care in hospitals and outpatient health care facilities.
                                The Novum IQ Syringe Infusion Pump is intended for use on adults, pediatrics and neonates.
                                The Novum IQ Syringe Infusion Pump is intended to aid in the reduction of operator interaction through guided programming, including a way to automate the programming of infusion parameters and documentation of infusion therapies. This automation is intended to aid in the reduction of programming errors.
                                The Novum IQ Syringe Infusion Pump is intended to be used by trained healthcare professionals.
                            </p>
                        </div>
                    </div>





                    <!-- Thumbnail images -->

                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="assets/vendor/multi-select/js/jquery.multi-select.js"></script>
    <script src="assets/libs/js/main-js.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="assets/vendor/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="assets/vendor/datatables/js/buttons.bootstrap4.min.js"></script>
    <script src="assets/vendor/datatables/js/data-table.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/rowgroup/1.0.4/js/dataTables.rowGroup.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
    <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="../assets/libs/js/main-js.js"></script>

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="../dist/jquery.flipster.min.js"></script>
    <script>
        var slideIndex = 1;
        showSlides(slideIndex);

        // Next/previous controls
        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        // Thumbnail image controls
        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("demo");
            var captionText = document.getElementById("caption");
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
            captionText.innerHTML = dots[slideIndex - 1].alt;
        }
    </script>
    </body>

    </html>