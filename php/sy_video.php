
        <div style="background: #1094fa; width: 97%; padding-left: 5px;" align="left">
            <span style="color: #FFFFFF; font-size: 30px; "><span class="fa fa-file-video-o"></span>&nbsp;免费视频</span>
            <a href="javascript:void(0)" onclick="window.location.href='http://localhost/blog_web/php/video_list.php?lm=1&name=前端'"><span class="btn btn-info" style="color: #FFFFFF;margin-bottom: 10px; margin-left: 80%;">&nbsp;查看更多>></span></a>
        </div>
        <ul style="text-align: center; padding-top: 5px;">
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "password";
            $dbname="db_blog";
            $date=date("Y-m-d");
            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);     //连接数据库
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT * FROM pic_message order by id desc limit 4 ";
                $result = $conn->query($sql);
                while($row=$result->fetch()){//操作数据
                    echo "<li style='width: 23%; height:200px; border-radius: 3%; display: inline-block; margin: 0 10px; overflow: hidden; '>";
                    echo "<a href='http://localhost/blog_web/php/video_play.php?wjm=".$row['wj_name']."'><img src='".$row['url']."' style='width: 100%; height: 100%; object-fit: cover;' alt='".$row['wj_name']."'/></a>";
                    echo "</li>";
                    //echo "<script>alert($('img').alt)</script>";onclick='video(".$row['wj_name'].")'
                        }
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
            ?>
        </ul>
