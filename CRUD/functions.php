<?php

function show_all_ids_in_dropdown_menu()
        {
            global $connection;
            $query = "SELECT id ";
            $query .= "FROM `shopping cart` ";
        
            $result = mysqli_query($connection, $query);
        
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
                echo "<option value='$id'>$id</option>";
        
            }
        }

?>