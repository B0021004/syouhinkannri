<?php
    $UserID = $_GET["UserID"];
    $UserName = $_GET["UserName"];
    //$password = $_GET["password"];
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
    
            // ５件だけ検索
            // SQLクエリを作成
            $query2 = 'SELECT * FROM Products_table WHERE OrderUserID = :UserID order by ProductID limit :start, :size';
            
            
            // SQL文をセット
            $stmt = $pdo->prepare($query2);

            // バインド
            $stmt->bindParam(':start', $start, PDO::PARAM_INT);
            $stmt->bindParam(':size', $size, PDO::PARAM_INT);
            $stmt->bindParam(':UserID', $UserID);

            // SQL文を実行
            $stmt->execute();
            
            // 実行結果のフェッチ
            $result2 = $stmt->fetchAll();

            require_once 'ViewSelect_tpl.php';
    }
        
        catch (PDOException $e){
            // 例外が発生したら無視
            require_once 'exception_tpl.php';
            echo $e->getMessage();
            exit();
        }
?>
