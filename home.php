
<?php include_once "./constants/db_conn.php";  

// Get status message
if(!empty($_GET['status'])){
    switch($_GET['status']){
        case 'succ':
            $statusType = 'alert-success';
            $statusMsg = 'Members data has been imported successfully.';
            break;
        case 'err':
            $statusType = 'alert-danger';
            $statusMsg = 'Some problem occurred, please try again.';
            break;
        case 'invalid_file':
            $statusType = 'alert-danger';
            $statusMsg = 'Please upload a valid CSV file.';
            break;
        default:
            $statusType = '';
            $statusMsg = '';
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Shopee</title>
</head>
<body>
    <!-- Navbar Section starts here -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <h3 class="nav-logo">Shopee</h3>
            </div>
            <div class="menu text-right" >
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="index.php"><button type="submit" class="btn btn-primary" name="log-out" formaction="/index.php">LogOut</button></a></li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>

    <section class="home">
        <!-- Import csv files -->
        <div class="container">
        <div class="csv-upload">
                <h1>Hello Welcome!</h1>
                <br><br>
                <form action="import.php" method="post" class="upload-csv" enctype="multipart/form-data">
                    <label>Choose CSV File : </label> <br>
                    <input type="file" name="csv-file" class="csv-file" accept=".csv">
                    <input type="submit" name="upload" class="upload btn btn-primary" value="Upload">
                </form>
        </div>

        <!-- Display status message -->
        <?php if(!empty($statusMsg)){ ?>
        <div class="alert">
            <div class="alert <?php echo $statusType; ?>" style="text-align: center;
    background-color: #957DAD; color: white;padding: 8px; margin: 10px; border-radius: 5px;"><?php echo $statusMsg; ?></div>
        </div>
        <?php } ?>

        <!-- Display uploaded data -->
        <div class="csv-display">
            <table class="product-display" border="2px" width="100%">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>SKU</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                        $sqlDisplay = "SELECT * FROM product_tb";

                        $resultDisplay = mysqli_query($conn,$sqlDisplay);
                        
                        if(mysqli_num_rows($resultDisplay) > 0) {
                            while($row=mysqli_fetch_array($resultDisplay)) { 
                    ?>

                                <tr>
                                    <td><?php echo $row['id'] ?></td>
                                    <td><?php echo $row['product_name'] ?></td>
                                    <td><?php echo $row['price'] ?></td>
                                    <td><?php echo $row['SKU'] ?></td>
                                    <td><?php echo $row['description'] ?></td>
                                </tr>
                
                    <?php    } 
                        } else { 
                    ?>

                                <tr><td colspan="5">No product(s)</td></tr>

                    <?php 
                        } 
                    ?>

                </tbody>
            </table>
        </div>
        </div>
    </section>

   <!-- social Section starts here -->
   <section class="social text-center">
        <div class="container">
            <ul>
                <li><a href="#"><img alt="svgImg" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHg9IjBweCIgeT0iMHB4Igp3aWR0aD0iNDgiIGhlaWdodD0iNDgiCnZpZXdCb3g9IjAgMCA0OCA0OCIKc3R5bGU9IiBmaWxsOiMwMDAwMDA7Ij48cGF0aCBmaWxsPSIjMDM5YmU1IiBkPSJNMjQgNUExOSAxOSAwIDEgMCAyNCA0M0ExOSAxOSAwIDEgMCAyNCA1WiI+PC9wYXRoPjxwYXRoIGZpbGw9IiNmZmYiIGQ9Ik0yNi41NzIsMjkuMDM2aDQuOTE3bDAuNzcyLTQuOTk1aC01LjY5di0yLjczYzAtMi4wNzUsMC42NzgtMy45MTUsMi42MTktMy45MTVoMy4xMTl2LTQuMzU5Yy0wLjU0OC0wLjA3NC0xLjcwNy0wLjIzNi0zLjg5Ny0wLjIzNmMtNC41NzMsMC03LjI1NCwyLjQxNS03LjI1NCw3LjkxN3YzLjMyM2gtNC43MDF2NC45OTVoNC43MDF2MTMuNzI5QzIyLjA4OSw0Mi45MDUsMjMuMDMyLDQzLDI0LDQzYzAuODc1LDAsMS43MjktMC4wOCwyLjU3Mi0wLjE5NFYyOS4wMzZ6Ij48L3BhdGg+PC9zdmc+"/></li >
                <li><a href="#"><img alt="svgImg" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHg9IjBweCIgeT0iMHB4Igp3aWR0aD0iNDgiIGhlaWdodD0iNDgiCnZpZXdCb3g9IjAgMCA0OCA0OCIKc3R5bGU9IiBmaWxsOiMwMDAwMDA7Ij48cGF0aCBmaWxsPSIjZjU1Mzc2IiBkPSJNMzQuMDE3LDQxLjk5bC0yMCwwLjAxOWMtNC40LDAuMDA0LTguMDAzLTMuNTkyLTguMDA4LTcuOTkybC0wLjAxOS0yMCBjLTAuMDA0LTQuNCwzLjU5Mi04LjAwMyw3Ljk5Mi04LjAwOGwyMC0wLjAxOWM0LjQtMC4wMDQsOC4wMDMsMy41OTIsOC4wMDgsNy45OTJsMC4wMTksMjAgQzQyLjAxNCwzOC4zODMsMzguNDE3LDQxLjk4NiwzNC4wMTcsNDEuOTl6Ij48L3BhdGg+PHBhdGggZmlsbD0iI2ZhYzhkNSIgZD0iTTI0LDMxYy0zLjg1OSwwLTctMy4xNC03LTdzMy4xNDEtNyw3LTdzNywzLjE0LDcsN1MyNy44NTksMzEsMjQsMzF6IE0yNCwxOWMtMi43NTcsMC01LDIuMjQzLTUsNSBzMi4yNDMsNSw1LDVzNS0yLjI0Myw1LTVTMjYuNzU3LDE5LDI0LDE5eiI+PC9wYXRoPjxjaXJjbGUgY3g9IjMxLjUiIGN5PSIxNi41IiByPSIxLjUiIGZpbGw9IiNmYWM4ZDUiPjwvY2lyY2xlPjxwYXRoIGZpbGw9IiNmYWM4ZDUiIGQ9Ik0zMCwzN0gxOGMtMy44NTksMC03LTMuMTQtNy03VjE4YzAtMy44NiwzLjE0MS03LDctN2gxMmMzLjg1OSwwLDcsMy4xNCw3LDd2MTIgQzM3LDMzLjg2LDMzLjg1OSwzNywzMCwzN3ogTTE4LDEzYy0yLjc1NywwLTUsMi4yNDMtNSw1djEyYzAsMi43NTcsMi4yNDMsNSw1LDVoMTJjMi43NTcsMCw1LTIuMjQzLDUtNVYxOGMwLTIuNzU3LTIuMjQzLTUtNS01SDE4IHoiPjwvcGF0aD48L3N2Zz4="/></li >
                <li><a href="#"><img alt="svgImg" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHg9IjBweCIgeT0iMHB4Igp3aWR0aD0iNDgiIGhlaWdodD0iNDgiCnZpZXdCb3g9IjAgMCA0OCA0OCIKc3R5bGU9IiBmaWxsOiMwMDAwMDA7Ij48cGF0aCBmaWxsPSIjMDNBOUY0IiBkPSJNNDIsMTIuNDI5Yy0xLjMyMywwLjU4Ni0yLjc0NiwwLjk3Ny00LjI0NywxLjE2MmMxLjUyNi0wLjkwNiwyLjctMi4zNTEsMy4yNTEtNC4wNThjLTEuNDI4LDAuODM3LTMuMDEsMS40NTItNC42OTMsMS43NzZDMzQuOTY3LDkuODg0LDMzLjA1LDksMzAuOTI2LDljLTQuMDgsMC03LjM4NywzLjI3OC03LjM4Nyw3LjMyYzAsMC41NzIsMC4wNjcsMS4xMjksMC4xOTMsMS42N2MtNi4xMzgtMC4zMDgtMTEuNTgyLTMuMjI2LTE1LjIyNC03LjY1NGMtMC42NCwxLjA4Mi0xLDIuMzQ5LTEsMy42ODZjMCwyLjU0MSwxLjMwMSw0Ljc3OCwzLjI4NSw2LjA5NmMtMS4yMTEtMC4wMzctMi4zNTEtMC4zNzQtMy4zNDktMC45MTRjMCwwLjAyMiwwLDAuMDU1LDAsMC4wODZjMCwzLjU1MSwyLjU0Nyw2LjUwOCw1LjkyMyw3LjE4MWMtMC42MTcsMC4xNjktMS4yNjksMC4yNjMtMS45NDEsMC4yNjNjLTAuNDc3LDAtMC45NDItMC4wNTQtMS4zOTItMC4xMzVjMC45NCwyLjkwMiwzLjY2Nyw1LjAyMyw2Ljg5OCw1LjA4NmMtMi41MjgsMS45Ni01LjcxMiwzLjEzNC05LjE3NCwzLjEzNGMtMC41OTgsMC0xLjE4My0wLjAzNC0xLjc2MS0wLjEwNEM5LjI2OCwzNi43ODYsMTMuMTUyLDM4LDE3LjMyMSwzOGMxMy41ODUsMCwyMS4wMTctMTEuMTU2LDIxLjAxNy0yMC44MzRjMC0wLjMxNy0wLjAxLTAuNjMzLTAuMDI1LTAuOTQ1QzM5Ljc2MywxNS4xOTcsNDEuMDEzLDEzLjkwNSw0MiwxMi40MjkiPjwvcGF0aD48L3N2Zz4="/></li >
            </ul>
        </div>
    </section>
    <!-- social Section ends here -->

    <!-- Footer starts here -->
    <section class="footer text-center">
        <div class="container">
            <p>All Rights reserved</p>
        </div>
    </section>
    <!-- Footer ends here -->
</body>
</html>