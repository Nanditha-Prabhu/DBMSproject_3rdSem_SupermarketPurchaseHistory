<!DOCTYPE html>
<html>

<head>
    <title>Sales History</title>
    <style>
        .in {
            font-size: 25px;
            color: black;
        }

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;

        }

        .ti {
            font-size: 40px;
            font-weight: bold;
            color: #5f37a3;
            text-shadow: 2px 2px 5px #2ebebc;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;

        }

        tr:nth-child(even) {
            background-color: white;
        }
    </style>
</head>

<body>
    <h1 class="ti" class="bi" align="center">D B SUPERMARKET PURCHASE HISTORY</h1>
    <form action="" method="post">
        <div class="group" align="center">
            <label for="InvoiceId" class="in">INVOICE ID:</label>
            <input type="text" class="control" id="InvoiceId" name="InvoiceId">
        </div>
        <div></div>
        <br>
        <div class="group" id="btn" align="center">
            <input type="submit" name="submit" value="SUBMIT">
        </div>
        <br>

    </form>
    <div></div>
    <div></div>
    <table>
        <thead>
            <th>Invoice ID</th>
            <th>Branch name</th>
            <th>Date of Purchase</th>
            <th>Time of billing</th>
            <th>Customer name</th>
            <th>Product Category</th>
            <th>Rate</th>
            <th>Quantity Purchased</th>
            <th>Taxes</th>
            <th>Total Payable amount</th>
            <th>Payment type</th>
            <th>Rating</th>
        </thead>
        <?php
        $con = new mysqli("localhost", "root", "", "supermarket");
        if (isset($_POST['submit'])) {
            $id = $_POST['InvoiceId'];

            $result = $con->query("SELECT InvoiceID, branch_name, class, Unit_price, Quantity, Tax, Total, date_, time_, payment_type, Rating, 
Customer_name FROM `sales`, `branch`, `product_line`, `payment_gateway`, `customer` WHERE branch_id = Branch AND
class_id = Product_line AND Payment = payment_type_id AND customer.Customer_id=sales.Customer_id AND InvoiceID = '$id';");

            foreach ($result as $value) {
        ?>
                <tr>
                    <td><?php echo $value['InvoiceID']; ?></td>
                    <td><?php echo $value['branch_name']; ?></td>
                    <td><?php echo $value['date_']; ?></td>
                    <td><?php echo $value['time_']; ?></td>
                    <td><?php echo $value['Customer_name']; ?></td>
                    <td><?php echo $value['class']; ?></td>
                    <td><?php echo $value['Unit_price']; ?></td>
                    <td><?php echo $value['Quantity']; ?></td>
                    <td><?php echo $value['Tax']; ?></td>
                    <td><?php echo $value['Total']; ?></td>
                    <td><?php echo $value['payment_type']; ?></td>
                    <td><?php echo $value['Rating']; ?></td>

                </tr>
    </table>
<?php
            }
        }
?>
</body>

</html>