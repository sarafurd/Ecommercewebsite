<?php
$mytime= getdate(date("U"));
$date= "$mytime[weekday],$mytime[month] $mytime[mday], $mytime[year]";

require "db.inc.php";

$sql = $conn->query("SELECT id FROM rate");
$numR=$sql->num_rows;

$sql=$conn->query("SELECT SUM(starRate) AS total FROM rate");
$data = $sql->fetch_array();
if(!empty($data['total'])) {
  $total=$data["total"];
} else {
  $total = 0;
}


$avg = ' ';

if($numR != 0){
 if(is_nan(round(($total/$numR), 1))){
   $avg=0;
  }else{
   $avg= $total/$numR;
   $niceavg= number_format($avg,1);
  }
}else{
$avg=0;
$niceavg= number_format($avg,1);
}

?>
<!DOCTYPE html>
<html id="top">
<head>
    <title>Review</title>
    <link rel="stylesheet" type="text/css" href="stylesheet/reviews.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script type = "text/javascript" src = "js/toggleSidebar.js"></script>
    <link rel="stylesheet" href="stylesheet/sidebar.css" media = "screen" type = "text/css"/>
    <script src="js/main.js"></script>
</head>
<body>
  <a id="top"></a>
  <header>
    <div class="main">
        <div class="logo">
            <img src="imgs/logo.jpg" style="align:center" />
        </div>
        <div id="sidebar">
            <div class="toggle-btn" onclick="toggleSidebar(this)">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="list">
              <div class="item"><li><a href = "oasisgardenreviews.php">Reviews</a></li></div>
              <div class="item"><li><a href = "oasisgardenaboutus.php">About Us</a></li></div>
              <div class="item"><li><a href = "filter.php">Store</a></li></div>
              <div class="item"><li><a href = "oasisgardencontactus.php">Contact Us</a></li></div>
              <div class="item"><li><a href = "emailsubscription.php">Subscribe</a></li></div>
              <div class="item"><li><a href = "chatbox-index.php">Chat box</a></li></div>
              <div class="item"><li><a href = "logout.php">Log out</a></li></div>
            </div>
        </div>
    </div>
      </header>
      <div class="container">
        <div class="rating-review">
          <div class="tri table-flex">
            <table>
              <tbody>
                <tr>
                  <td>
                    <div class="rnb rv1">
                      <h3><?php  echo $niceavg?>/5.0</h3>
                    </div>
                     <div class="pdt-rate">
                       <div class="pro-rating">
                         <div class="clearfix rating mart8">
                         <div class="rating-stars">
                        <div class="grey-stars"></div>
                        <?php
                          $percentage = $avg * 20;
                        ?>
                        <div class="filled-stars" style="width:<?= (($niceavg)/5)*100;?>%"></div>
                         </div></div>
                       </div>
                    </div>
                    <div class="rnrn">
                    </div>
                  </td>
                  <td>
                    <div class="rpb">
                      <div class="rnpb">
                        <label>5 <i class="fa fa-star"></i></label>
                        <div class="ropb">
                          <div class="ripb" style="width:80%"></div>
                      </div>
                      <div class="label">(8)</div>
                      </div>
                      <div class="rnpb">
                        <label>4 <i class="fa fa-star"></i></label>
                        <div class="ropb">
                          <div class="ripb" style="width:30%"></div>
                      </div>
                      <div class="label">(4)</div>
                      </div>
                      <div class="rnpb">
                        <label>3 <i class="fa fa-star"></i></label>
                        <div class="ropb">
                          <div class="ripb" style="width:20%"></div>
                      </div>
                      <div class="label">(4)</div>
                      </div>
                      <div class="rnpb">
                        <label>2 <i class="fa fa-star"></i></label>
                        <div class="ropb">
                          <div class="ripb" style="width:0%"></div>
                      </div>
                      <div class="label">(2)</div>
                      </div>
                      <div class="rnpb">
                        <label>1 <i class="fa fa-star"></i></label>
                        <div class="ropb">
                          <div class="ripb" style="width:0%"></div>
                      </div>
                      <div class="label">(2)</div>
                      </div>
                    </div>
                  </td>
                  <td>
                   <div class="rrb">
                     <p>Please Review Our Products!</p>
                    <button class="rbtn opmd">Add Review</button>
                   </div>
                  </td>
                </tr>
              </tbody>
            </table>
              <div class="review-modal" style="display:none">
                <div class="review-bg"></div>
                <div class="rmp">
                  <div class="rpc">
                    <span><i class="fa fa-times"></i></span>
                  </div>
                  <div class="rps" align="center">
                    <i class="fa fa-star" data-index="0" style="display:none"></i>
                    <i class="fa fa-star" data-index="1"></i>
                    <i class="fa fa-star" data-index="2"></i>
                    <i class="fa fa-star" data-index="3"></i>
                    <i class="fa fa-star" data-index="4"></i>
                   <i class="fa fa-star" data-index="5"></i>
                  </div>
                  <input type="hidden" value="" class="starRateV">
                  <input type="hidden" value="<?php echo $date;?>" class="rateDate">
                  <div class="rptf" align="center">
                    <input type="text" class="raterName" placeholder="Enter Your name...">
                 </div>
                 <div class="rptf" align="center">
                   <textarea class="rateMsg" id="rate-field" placeholder="Describe Your Experience"></textarea>
                </div>
                <div class="rate-error" align="center"></div>
                <div class="rpsb" align="center">
                  <button class="rpbtn">Post Review</button>
                </div>
              </div>
            </div>
         </div>
        <div class="bri">
          <div class="uscm">

            <?php
             $sqlp= "SELECT * FROM rate";
             $result = $conn->query($sqlp);
             if(mysqli_num_rows($result) > 0){
                while($row = $result->fetch_assoc()){

             ?>
            <div class="uscms-secs">
              <div class="us-img">
                <p><?= substr($row['rateName'],0,1); ?></p>
              </div>
              <div class="uscms">
                <div class="us-rate">
                  <div class="pdt-rate">
                    <div class="pro-rating">
                      <div class="clearfix rating mart8">
                      <div class="rating-stars">
                        <div class="grey-stars"></div>
                        <?php
                          $percentage = $row['starRate'] * 20;
                        ?>
                        <div class="filled-stars" style="width:<?= $percentage;?>%"></div>
                      </div></div>
                    </div>
                 </div>
                </div>
                <div class="us-cmt">
                  <p><?=$row['rateMsg'] ?></p>
                </div>
                <div class="us-nm">
                  <p><i>By<span class="cmnm"> <?= $row['rateName'] ?></span> on <span class="cmdt"><?=$row['rateDate'] ?></i></p>
                </div>
              </div>
            </div>
            <?php
          }
        }
             ?>
          </div>
        </div>
        </div>
      </div>
      <div class="top" style="text-align:right">
        <a href="#top">TOP</a>
      </div>

      <footer>
            <div class="column" align="center">
                <a href="https://www.facebook.com/OasisFullertonStore">
                    <img src="imgs/facebook.png" alt="facebook" >
                </a>
                <a href="https://www.instagram.com/oasisestore/">
                <img src="imgs/instagram.png" alt="instagram" >
                </a>
                <a href="https://twitter.com/oasisstore2">
                <img src="imgs/twitter.png" alt="twitter" >
                </a>
        </div>
      </footer>


</body>
</html>
<!--yeet-->
