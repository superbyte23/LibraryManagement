<?php 

function redirect($url){
	return header('location: '.$url);
}

function csrf(){ 
	$_SESSION['token'] = bin2hex(random_bytes(32)); 
  	$token = $_SESSION['token']; 
	echo "<input type='hidden' name='token' value='".$token."' />";
}

function set_menu_active($page){
  if (isset($_GET['view'])) {
    if ($_GET['view'] == $page) {
      echo 'active show';
    }
  }elseif (isset($_GET['id'])) {
    if ($_GET['id'] == $page) {
      echo 'active';
    }
  }elseif (isset($_GET['controller'])) {
    if ($_GET['controller'] == $page) {
      echo 'active';
    }
  }
} 

// Function to find rank
// function rankify($A , $n)
// {    
//   // Rank Vector
//   $R = array(0); 
//   // Sweep through all elements in A for each
//   // element count the number of less than and
//   // equal elements separately in r and s.
//   for ($i = 0; $i < $n; $i++)
//   {
//       $r = 1;
//       $s = 1; 
//       for ($j = 0; $j < $n; $j++)
//       {
//           if ($j != $i && $A[$j] < $A[$i])
//               $r += 1;
               
//           if ($j != $i && $A[$j] == $A[$i])
//               $s += 1;    
//       } 
//       // Use formula to obtain rank
//       $R[$i] = $r + (float)($s - 1) / (float) 2; 
//   } 
//   for ($i = 0; $i < $n; $i++){
//     print number_format($R[$i], 1) . ' ';
//   }
      
// }

function rankify($A , $n)
  { 
    // Rank Vector
    $R = array(0); 
    // Sweep through all elements in A for each
    // element count the number of less than and
    // equal elements separately in r and s.
    for ($i = 0; $i < $n; $i++)
    {
        $r = 1;
        $s = 1; 
        for ($j = 0; $j < $n; $j++)
        {
            if ($j != $i && $A[$j] < $A[$i])
                $r += 1;
                 
            if ($j != $i && $A[$j] == $A[$i])
                $s += 1;    
        } 
        // Use formula to obtain rank
        $R[$i] = $r + (float)($s - 1) / (float) 2; 
    } 
    // for ($i = 0; $i < $n; $i++){
    //     print number_format($R[$i], 1) . ' ';
    // }
    return $R;        
} 

function rankify_asc($A , $n)
  { 
    // Rank Vector
    $R = array(0); 
    // Sweep through all elements in A for each
    // element count the number of less than and
    // equal elements separately in r and s.
    for ($i = 0; $i < $n; $i++)
    {
        $r = 1;
        $s = 1; 
        for ($j = 0; $j < $n; $j++)
        {
            if ($j != $i && $A[$j] > $A[$i])
                $r += 1;
                 
            if ($j != $i && $A[$j] == $A[$i])
                $s += 1;    
        } 
        // Use formula to obtain rank
        $R[$i] = $r + (float)($s - 1) / (float) 2; 
    } 
    // for ($i = 0; $i < $n; $i++){
    //     print number_format($R[$i], 1) . ' ';
    // } 
    return $R; 
} 

//calculate rank for key value pair array
function calculate_rank($rank_values): array {
    asort($rank_values);
    $rank_array = [];
    $rank = 0;
    $r_last = null;
    foreach ($rank_values as $key => $value) {
        if ($value != $r_last) {
            if($value > 0){ //if you want to set zero rank for values zero
              $rank++;
            }
            $r_last = $value;
        }
        $rank_array[$key] = $value > 0 ? $rank: 0; //if you want to set zero rank for values zero
    }    
    return $rank_array;
}

function ordinal($number) {
    $ends = array('th','st','nd','rd','th','th','th','th','th','th');
    if ((($number % 100) >= 11) && (($number%100) <= 13))
        return $number. 'th';
    else
        return $number. $ends[$number % 10];
}

function placeholders(){
    echo '<ul class="list-group list-group-flush placeholder-glow d-none" id="placeholder">
              <li class="list-group-item">
                <div class="row align-items-center">
                  <div class="col-auto">
                    <div class="avatar avatar-rounded placeholder"></div>
                  </div>
                  <div class="col-7">
                    <div class="placeholder placeholder-xs col-9"></div>
                    <div class="placeholder placeholder-xs col-7"></div>
                  </div>
                  <div class="col-2 ms-auto text-end">
                    <div class="placeholder placeholder-xs col-8"></div>
                    <div class="placeholder placeholder-xs col-10"></div>
                  </div>
                </div>
              </li>
              <li class="list-group-item">
                <div class="row align-items-center">
                  <div class="col-auto">
                    <div class="avatar avatar-rounded placeholder"></div>
                  </div>
                  <div class="col-7">
                    <div class="placeholder placeholder-xs col-9"></div>
                    <div class="placeholder placeholder-xs col-7"></div>
                  </div>
                  <div class="col-2 ms-auto text-end">
                    <div class="placeholder placeholder-xs col-8"></div>
                    <div class="placeholder placeholder-xs col-10"></div>
                  </div>
                </div>
              </li>
              <li class="list-group-item">
                <div class="row align-items-center">
                  <div class="col-auto">
                    <div class="avatar avatar-rounded placeholder"></div>
                  </div>
                  <div class="col-7">
                    <div class="placeholder placeholder-xs col-9"></div>
                    <div class="placeholder placeholder-xs col-7"></div>
                  </div>
                  <div class="col-2 ms-auto text-end">
                    <div class="placeholder placeholder-xs col-8"></div>
                    <div class="placeholder placeholder-xs col-10"></div>
                  </div>
                </div>
              </li>
              <li class="list-group-item">
                <div class="row align-items-center">
                  <div class="col-auto">
                    <div class="avatar avatar-rounded placeholder"></div>
                  </div>
                  <div class="col-7">
                    <div class="placeholder placeholder-xs col-9"></div>
                    <div class="placeholder placeholder-xs col-7"></div>
                  </div>
                  <div class="col-2 ms-auto text-end">
                    <div class="placeholder placeholder-xs col-8"></div>
                    <div class="placeholder placeholder-xs col-10"></div>
                  </div>
                </div>
              </li>
            </ul>';
}

function dd($arr){
    echo "<pre>".var_export($arr, true)."</pre>"; 
}

function display_date($date, $format){
  if ($date != "" || !empty($date)) {
    $new_date = date_create($date);
    return date_format($new_date, $format);
  }else{
    return "NA";
  }
  
}



?>