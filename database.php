<?php
				session_start();
                /*資料庫連結*/
                $db_ip="127.0.0.1";
                $db_user="root";
                $db_pwd="123456789";
                $db_link=@mysqli_connect($db_ip, $db_user, $db_pwd, "專題");
				
				

                mysqli_query($db_link, 'SET CHARACTER SET UTF-8');
                ?>
				<?php
	 mysqli_query($db_link, 'SET CHARACTER SET UTF-8');
				# 設定時區
				date_default_timezone_set('Asia/Taipei');
				$getDate= date("Y-m-d");
	?>
   
            <?php
            //...
            $sql = "SELECT * FROM posts where old='0' && keep='1' order by `date` ASC ";
            $result = mysqli_query($db_link, $sql);
			
            ?>
         
							
                            <?php
                            while ($row = $result->fetch_assoc()) {
									
								
									
								if($getDate==$row[date] || $row[date]<$getDate){
									$sqlii="update `posts` set keep='0'  where `p_id`='$row[p_id]'";
									mysqli_query($db_link, $sqlii);
									
									
								}
                              
                            }
                           

                            
                            ?>
							<?php
            //...
            $sqlp = "SELECT * FROM posts where old='0' && keep='0'  order by `date` ASC ";
            $resultp = mysqli_query($db_link, $sqlp);
			
            ?>
                            <?php
                            while ($rowp = $resultp->fetch_assoc()) {
									
									
								if($getDate>=$rowp[newday]){
									$sqlp="update `posts` set old='1'  where `p_id`='$row[p_id]'";
									mysqli_query($db_link, $sqlp);
									
									
								}
                                
                            }
                           

                            
                            ?>