<?php
  //debugging
  //$fileName = './testdata/hosts';
  $fileName = '/etc/hosts.dnsmasq';

  $txt_file = "";
  if (isset($_GET['sendValue'])){
    $incoming = $_GET['sendValue'];
  }
  if (isset($_GET['addvalue'])){
  $addLine = $_GET['addvalue'];
  }

  if (isset($_GET['delvalue'])){
    $delLine = $_GET['delvalue'];
  }

  if (isset($addLine)){
      //check formatting
      $data = explode(' ', $addLine);
      if (sizeof($data) != 2){
          print_r("Invalid request");
          return;
      } else {
        //read file
        $txt_file = file_get_contents($fileName);
        //add new line
        $txt_file .= "\n" . $addLine;
        //write file, check if it actually did it
        $success = file_put_contents($fileName, $txt_file);
        //if it failed
        if ($success == FALSE){
            print_r("Failure writing.");
        }else{
            //it worked
            print_r("Success");
        }
    }
    return;
  }

  if (isset($delLine)){
    $subData = explode(' ', $delLine);
      if (sizeof($subData) != 2){
          print_r("Invalid request");
          return;
      } else {
        $txt_file = file_get_contents($fileName);
        $rows = explode("\n", $txt_file);;
        foreach ($rows as $row => $data)
        {
          $row_data = explode(' ', $data);
          //Skip blank rows
          if (sizeof($row_data) == 1){
              continue;
          }
          if (($subData[0] == $row_data[0]) && ($subData[1] == $row_data[1])){
            //remove this row
            unset($rows[$row]);
          }
        }

        $newhosts = "";

        foreach ($rows as $rrow => $data){
          $newhosts .= $data . "\n";
        }
        $success = file_put_contents($fileName, $newhosts);
        if ($success == FALSE){
          print_r("Failure writing.");
        }else{
          //it worked
          print_r("Success");
        }
        return;
      }
  }

  if( isset( $incoming ) ) {
    if ($incoming == "getValues"){
        $returndata = "";
        $txt_file = file_get_contents($fileName);
        $rows = explode("\n", $txt_file);;
        foreach ($rows as $row => $data)
        {
            $row_data = explode(' ', $data);
            //Skip blank rows
            if (sizeof($row_data) == 1){
                continue;
            }
            //Skip comments
            if ($row_data[0] == "#"){
              continue;
            }
            $info[$row]['ip'] = $row_data[0];
            $info[$row]['domain'] = $row_data[1];
            //For safety reasons we probably shouldn't let localhost be deleted
            if($info[$row]['domain'] == "localhost"){
              $returndata .= '<p class="resolvlist">IP ' . $info[$row]['ip'] . ' resolves as ' . $info[$row]['domain'] . '</p>';
            } else {
            //echo '<p class="resolvlist">IP ' . $info[$row]['ip'] . ' resolves as ' . $info[$row]['domain'] . '</p>';
            $returndata .= '<p class="resolvlist">IP ' . $info[$row]['ip'] . ' resolves as ' . $info[$row]['domain'] . '  <button onClick="delList(\'' . $info[$row]['ip'] . ' ' . $info[$row]['domain'] . '\');" type="button">Delete</button></p>';
            }
        }
        print_r($returndata);
    }else {
    print_r("ajax-php-page.php recieved this: " . "$incoming" . "<br>");
    }
    return;
  } else {
    print_r("The request didn´t pass correctly through the GET...");
    return;
  }

?>
