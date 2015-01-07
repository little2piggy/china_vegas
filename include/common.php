<?php
function curPageName() {
 return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
}

function array_sort($array, $on, $order=SORT_ASC)
{
    $new_array = array();
    $sortable_array = array();

    if (count($array) > 0) {
        foreach ($array as $k => $v) {
            if (is_array($v)) {
                foreach ($v as $k2 => $v2) {
                    if ($k2 == $on) {
                        $sortable_array[$k] = $v2;
                    }
                }
            } else {
                $sortable_array[$k] = $v;
            }
        }

        switch ($order) {
            case SORT_ASC:
                asort($sortable_array);
            break;
            case SORT_DESC:
                arsort($sortable_array);
            break;
        }
	    $i = 0;
        foreach ($sortable_array as $k => $v) {
            $new_array[$i++] = $array[$k];
        }
    }

    return $new_array;
}

function get_days(){

  $checkin = $_SESSION['checkin'];
  $checkout = $_SESSION['checkout'];	
  // Firstly, format the provided dates.
  // This function works best with YYYY-MM-DD
  // but other date formats will work thanks
  // to strtotime().
  $checkin = date("Y/m/d", strtotime($checkin));
  $checkout = date("Y/m/d", strtotime($checkout));
  // Start the variable off with the start date
  $aDays[] = $checkin;


  // Set a 'temp' variable, sCurrentDate, with
  // the start date - before beginning the loop
  $sCurrentDate = $checkin;

  // While the current date is less than the end date
  while($sCurrentDate < $checkout){
    // Add a day to the current date
	
    $sCurrentDate = date("Y/m/d", strtotime("+1 day", strtotime($sCurrentDate)));
    // Add this new day to the aDays array
    $aDays[] = $sCurrentDate;
	
  }
  // Once the loop has finished, return the
  // array of days.
  return $aDays;
}

?>