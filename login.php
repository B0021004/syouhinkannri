<?php
    $UserID = $_GET["UserID"];
    $password = $_GET["password"];
    $start = $_GET["start"];
    $size = $_GET["size"];

    try{
        // データベースに接続
        $pdo = new PDO(
            // ホスト名、データベース名
            'mysql:host=localhost;dbname=order;charset=utf8;',
            // ユーザー名
            'root',
            // パスワード
            '',
            // レコード列名をキーとして取得させる
            [ PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ]
        );
    
        // SQLクエリを作成
        $query = 'SELECT * FROM Users_table WHERE UserID = :UserID AND password = :password';
        
        // SQL文をセット
        $stmt = $pdo->prepare($query);
        
        // バインド
        $stmt->bindParam(':UserID', $UserID);
        $stmt->bindParam(':password', $password);

        // SQL文を実行
        $stmt->execute();
        
        // 実行結果のフェッチ
        $result = $stmt->fetchAll();
//        var_dump($result);
        if(empty($result)){
            require_once 'login.html';
        }
        else{
            $UserName = $result[0]["UserName"];

            // ５件だけ検索
            // SQLクエリを作成
            //$query2 = 'SELECT * FROM Products_table order by ProductID limit :start, :size';
            $query2 = 'SELECT * FROM Products_table WHERE OrderUserID = :UserID order by ProductID limit :start, :size';
            
            // SQL文をセット
            $stmt2 = $pdo->prepare($query2);

            // バインド
            $stmt2->bindParam(':UserID', $UserID);
            $stmt2->bindParam(':start', $start, PDO::PARAM_INT);
            $stmt2->bindParam(':size', $size, PDO::PARAM_INT);

            // SQL文を実行
            $stmt2->execute();
            
            // 実行結果のフェッチ
            $result2 = $stmt2->fetchAll();

            require_once 'ViewSelect_tpl.php';
        }
    }
        
        catch (PDOException $e){
            // 例外が発生したら無視
            require_once 'exception_tpl.php';
            echo $e->getMessage();
            exit();
        }
?>
