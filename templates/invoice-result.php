<?php
//require('../includes/config.php');
//$invoiceID = 'in_123456789';
//$stripeKey = "{PRIVATE_KEY}";
//date_default_timezone_set('UTC');
//Stripe::setApiKey($stripeKey);
//
////$this->printArray($in);
//$invoice = Stripe_Invoice::retrieve($invoiceID);
//?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Invoice</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Customer Invoice">
    <meta name="author" content="5marks">

    <link rel="stylesheet" href="/global/css/bootstrap.css">
    <style>
        .invoice-head td {
            padding: 0 8px;
        }
        .container {
            padding-top:30px;
        }
        .invoice-body{
            background-color:transparent;
        }
        .invoice-thank{
            margin-top: 60px;
            padding: 5px;
        }
        address{
            margin-top:15px;
        }
    </style>
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <link rel="shortcut icon" href="/favicon.ico">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">
</head>

<body>
<div class="container">
    <div class="row">
        <div class="span4">
            <address>
                <strong>KTown Cars</strong><br>
                101 University ave<br>
                Kingston, ON K1T 5L3<br>
            </address>
        </div>
        <div class="span4 well">
            <table class="invoice-head">
                <tbody>
                <tr>
                    <td class="pull-right"><strong>Member's Name</strong></td>
                    <td><?php echo $memberInfo["firstName"]." ".$memberInfo["lastName"]; ?></td>
                </tr>
                <tr>
                    <td class="pull-right"><strong>Member #</strong></td>
                    <td><?php echo $values["memberID"]; ?></td>
                </tr>
                <tr>
                    <td class="pull-right"><strong>Period</strong></td>
                    <td><?php echo $values["startDate"] .' to ' . $values["endDate"]; ?></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="span8">
            <h2>Invoice</h2>
        </div>
    </div>
    <div class="row">
        <div class="span8 well invoice-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Description</th>
                    <th>Number</th>
                    <th>Amount</th>
                </tr>
                </thead>
                <tbody>

                <?php
                $total = 0;
                foreach($fees as $reservation){
                    echo '<tr>';
                    $amount = ($reservation['daysReserved']*$reservation['rentalFee']);
                    echo '<td> Reservation #: '.$reservation['reservationNum'].' ($'.$reservation['rentalFee'].')</td>';
                    echo '<td>' .$reservation['daysReserved'].' days</td>';
                    echo '<td>$'.$amount. '</td>';
                    $total += $amount;
                    echo '</tr>';
                }

                echo '<tr>';
                $amount = $memberInfo['membershipFee'];
                echo '<td> Membership Fees ($'.$amount.')</td>';
                echo '<td> 1 per Month</td>';
                echo '<td>$'.$amount. '</td>';
                $total += $amount;
                echo '</tr>';

                ?>
                <tr>
                    <td>&nbsp;</td>
                    <td><strong>Total</strong></td>
                    <td><strong>$<?php echo $total ?></strong></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="span6 offset1 well invoice-thank">
            <h5 style="text-align:center;">Thank You!</h5>
        </div>
    </div>
    <div class="row">
        <div class="span3">
            <strong>Phone:</strong> <a href="tel:555-555-5555">555-555-5555</a>
        </div>
        <div class="span3">
            <strong>Email:</strong> <a href="mailto:hello@ktowncars.co">hello@ktowncars.co</a>
        </div>
        <div class="span3">
            <strong>Website:</strong> <a href="http://ktowncars.co">http://ktowncars.co</a>
        </div>
    </div>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script>!window.jQuery && document.write(unescape('%3Cscript src="js/jquery/jquery-1.7.1.min.js"%3E%3C/script%3E'))</script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>