<!doctype html>
<html lang="zxx">
<head>
    <title>Payment Receipt</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700&amp;display=swap" rel="stylesheet">
    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<style>
    body {
    background: #f5f6ff;
    padding: 3rem 0;
}
.print-button-container {
    width: 100%;
    text-align: center;
}
.print-button {
    line-height: 27px;
    font-size: 16px;
    font-weight: 400;
    color: #fff;
    background-color: #232936;
    box-shadow: 0 2px 8px rgba(0, 0, 0, .1);
    border-radius: 4px;
    padding: 10px 20px;
    display: inline-block;
    text-align: center;
    margin-bottom: 2.5rem;
    transition: .3s;
    text-decoration: none!important;
    outline: none!important;
    width: auto;
}
.print-button:hover {
    background: #59ab6e;
    color: #fff;
}
.invoice {
    background: #fff;
    border-radius: 4px;
}
.bg-dark {
    background: #59ab6e !important;
    color: #fff !important;
}
.font-weight-bold {
    color: #333;
    font-weight: 600 !important;
}
@media only screen and (max-width: 575px) {
    .the-five {
    padding: 10px !important;
    }
}

.invoice{
    background:white;
    border-radius:10px;
} .container{
    width:100%;
    padding-right:30px;
    padding-left:30px;
    margin-right:auto;
    margin-left:auto;
}
.text-right{
    text-align:right!important;
}
.p-5{
    padding:2rem!important;
}


</style>
<body>
    <div class="print-button-container">
        <a href="dash/dashboard.php" class="print-button">View Dashboard</a>
    </div>
    <div class="container invoice mb-0">
        <div class="row">
            <div class="col-12">
                <div class="card border-0">
                    <div class="card-body p-0">
                        <div class="row p-5 the-five">
                            <div class="col-md-6">
                                <img src="images/rest.png" width="80" alt="Logo">
                            </div>

                            <div class="col-md-6 text-right">
                                <p class="font-weight-bold mb-1">Payment #550</p>
                                <p class="text-muted">Date: 4 Jan, 2020</p>
                            </div>
                        </div>

                        <hr class="my-5">

                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="font-weight-bold mb-4">Payment Made To</h3>
                                <p class="mb-0">Name:<span style="color:black; font-weight:15px;"><strong> Afybas Fabric Haven</strong></span></p>
                            </div>

                            <div class="col-md-6 text-right">
                                <h3 class="font-weight-bold mb-4">Payment Details</h3>
                                <p class="mb-1">Name:<span style="color:black; font-weight:15px;"><strong> Dramani Alhassan</strong></span></p>
                                <p class="mb-1">Payment Type: Momo</p>
                            </div>
                        </div>
                        <div class="row p-5 the-five">
                            <div class="col-md-12">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="border-0 text-uppercase small font-weight-bold">Order #</th>
                                            <th class="border-0 text-uppercase small font-weight-bold">Product Name</th>
                                            <th class="border-0 text-uppercase small font-weight-bold">Quantity</th>
                                            <th class="border-0 text-uppercase small font-weight-bold">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>DOT FABRIC</td>
                                            <td>1</td>
                                            <td>GH₵ 5000</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="d-flex flex-row-reverse bg-dark text-white p-4">
                            <div class="py-3 px-5 text-left">
                                <div class="mb-2">Grand Total</div>
                                <div class="h2 font-weight-light">GH₵ 5000</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JQUERY JS -->
    <script src="js/jquery-3.5.1.min.js"></script>

</body>
</html>