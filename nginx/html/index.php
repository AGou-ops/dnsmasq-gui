<?php
include('./modifyfile.php');
?>
<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>dnsmasq GUI</title>
  <meta name="description" content="A basic Web GUI for interfacing with dnsmasq">
  <meta name="author" content="nzgamer41">

  <meta property="og:title" content="dnsmasq GUI">
  <meta property="og:type" content="website">
  <meta property="og:description" content="A basic Web GUI for interfacing with dnsmasq">
  <link rel="stylesheet" href="./assets/style.css">
  <script>
    // function invoking ajax with pure javascript, no jquery required.
  function myFunction(value_myfunction) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        //document.getElementById("results").innerHTML += this.responseText;
        // note '+=', adds result to the existing paragraph, remove the '+' to replace.
        if (this.responseText == "Success"){
            location.reload();
        }
        else{
            alert(this.responseText);
        }
      }
    };
    xmlhttp.open("GET", "ajax.php?addvalue=" + value_myfunction, true);
    xmlhttp.send();
  }

  function addUpdate(formdata){
    var ipaddress = formdata.elements['ip'].value;
    var domainname = formdata.elements['domain'].value;
    var hoststring = ipaddress + " " + domainname;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        //document.getElementById("results").innerHTML += this.responseText;
        // note '+=', adds result to the existing paragraph, remove the '+' to replace.
        if (this.responseText == "Success"){
            location.reload();
        }
        else{
            alert(this.responseText);
        }
      }
    };
    xmlhttp.open("GET", "ajax.php?addvalue=" + hoststring, true);
    xmlhttp.send();
  }

  function delList(data){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        //document.getElementById("results").innerHTML += this.responseText;
        // note '+=', adds result to the existing paragraph, remove the '+' to replace.
        if (this.responseText == "Success"){
            location.reload();
        }
        else{
            alert(this.responseText);
        }
      }
    };
    xmlhttp.open("GET", "ajax.php?delvalue=" + data, true);
    xmlhttp.send();
  }

  function getInitialData() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("fileData").innerHTML = this.responseText;
        // note '+=', adds result to the existing paragraph, remove the '+' to replace.
      }
    };
    xmlhttp.open("GET", "ajax.php?sendValue=getValues", true);
    xmlhttp.send();

    const form = document.getElementById('addupdatedata');

    form.addEventListener('submit', (event) => {
    // handle the form data
      addUpdate(form);
    });
  }
</script>
</head>

<body onload="getInitialData()">
    <h1>dnsmasq WEB GUI</h1>
    <div id="fileData"><p class="resolvlist">Loading...</div>
    <div class="formArea">
      <form id="addupdatedata">
        <label for="ip">IP Address:</label>
        <input type="text" id="ip" name="ip">
        <label for="domain">Domain Name:</label>
        <input type="text" id="domain" name="domain"><br><br>
        <input type="submit" value="Update(Reload Dnsmasq)">
      </form>
    </div>
    <hr>
<h1 align="center">Edit dnsmasq.conf</h1>
<?php if (!empty($error_msg)): ?>
        <div style="color: red;display: flex; justify-content: center; align-items: center; "><?php echo $error_msg; ?></div>
    <?php endif; ?>
    <?php if (!empty($success_msg)): ?>
        <div style="color: green;display: flex; justify-content: center; align-items: center; "><?php echo $success_msg; ?></div>
    <?php endif; ?>
    <div style="display: flex; justify-content: center; align-items: center; ">
    <form method="post" style="margin:0px auto;text-align: center;display: block;">
        <textarea name="file_content" rows="20" cols="80"><?php echo htmlspecialchars($file_content); ?></textarea><br>
        <input type="submit" value="Save">
    </form>
    </div>

    <br><br>
    <hr>
    <!--<button onClick="myFunction('127.0.0.1 testdomain.com');" type="button">Add DNS result</button>-->
    <h4>Responses from server:</h4>
    <p id="results"><?php echo date("d-m-y");?>: Ready</p> <!-- the ajax javascript enters returned GET values here -->
</body>
</html>
