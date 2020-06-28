<?php
require_once 'config.php';
session_start();
?>
<?php
function insert_record($tablename, $arr) {
    global $conn;
    $insert = "insert into " . $tablename . " set ";
    foreach ($arr as $key => $value) {
        $value = mysqli_real_escape_string($conn,$value);
        $insert .= $key . "='" . $value . "' ,";
    }
    $insert = rtrim($insert, ", ");
    $err = mysqli_query($conn, $insert);

    if (!$err) {
        echo mysqli_error() . "-" . $insert;
        return false;
    } else {
        return mysqli_insert_id($conn);
    }
}

if(isset($_POST['submit']) && $_POST['submit']!=""){
    $validate = "true";
    $msg_arr = array();
    $msg = "";
    if(trim($_POST['title'])==""){
        $validate = "false";
        $msg_arr[] = "Title";
        
    }
    if(trim($_POST['categorie'])==""){
        $validate = "false";
        $msg_arr[] = "Categorie";
    }
    if(trim($_POST['vraag'])==""){
        $validate = "false";
        $msg_arr[] = "Vraag";
    }
    if(trim($_POST['tijd'])==""){
        $validate = "false";
        $msg_arr[] = "Tijd";
    }
    if(trim($_POST['link'])==""){
        $validate = "false";
        $msg_arr[] = "Link";
    }
    if($validate=="false"){
        $msg = implode(", ",$msg_arr);
        $_SESSION['msg'] = $msg." Required";
        $_SESSION['post_arr'] = $_POST;
        
    }
    $arr = array(
        'post_title'=>$_POST['title'],
        'post_cat'=>$_POST['categorie'],
        'post_vraag'=>$_POST['vraag'],
        'post_antwoord'=>$_POST['post_antwoord'],
        'post_app'=>$_POST['post_app'],
        'post_tijd'=>$_POST['tijd'],
        'post_link'=>$_POST['link'],
        'created_at'=>date('Y-m-d H:i:s'),
    );
    $ins = insert_record('post_main', $arr);
    
    echo '<script>window.location.href="'.$base_url.'"</script>';exit;
}
else{
    echo '<script>window.location.href="'.$base_url.'"</script>';
}
?>