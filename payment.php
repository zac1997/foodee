<!DOCTYPE html>
<html>
<head>
	<title>payment</title>

<style>
p.serif {
    font-family: "Times New Roman", Times, serif;
}

p.sansserif {
    font-family: Arial, Helvetica, sans-serif;
}

#def{
   margin-left: 420px;
   margin-top: 100px;
}

div{
    border: 5px solid black;
    margin-right:300px;
    margin-top: 300px;
}

h2{
    text-align: center;
}

#andy{
    width: 45px;
}

#addy{
    width: 35px;
}


</style>
</head>
<body>



    <div id="def">
 	<h2><font color="black">PAYMENT GATEWAY</font></h2>

	  <form action="dbcontroller.php" onsubmit="return validateForm()" method="POST">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Card Holders name: </label>
            &nbsp;&nbsp;<input type="text" name="name"  placeholder="Enter name" required><br><br>
            
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Card No:</label> 
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" class="serif" name="cno" placeholder="Enter card no." required><br><br>
            
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Expiration : </label>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" class="serif" name="month" id = "addy" placeholder="mnth" required> / <input type="text" class="serif" name="year" placeholder="year" id="andy" required><br><br>
            
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Security Code : </label>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" class="serif" name="cvv" placeholder="CVV no" required><br><br>

            <br>
            <br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Pay Now" name="pay"></p>
            <input type="hidden" name="total_price" value="<?= $_POST['total_price'] ?>" />
	  </form>
	 </div>


<script type="text/javascript">

	function validateForm() {
    var x = document.forms["myForm"]["fname"].value; 
    var cvv = document.forms["myForm"]["cvv"].value; 
    var cardno = document.forms["myForm"]["cardno"].value; 



    if (cardno.length != "16") {
        alert("NOT MORE THAN 16 DIGITS");
        return false;
    }

    if (cvv.length != "3") {
        alert("NOT MORE THAN 3 DIGITS");
        return false;
    }

    if (x != "100") {
        alert("INVALID");
        return false;
    }

}
</script>
</body>
</html>