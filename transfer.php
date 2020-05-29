<?php

$user = 'root';
$pass = '';

$mdc = new PDO("mysql:host=localhost;dbname=mdc",$user,$pass);
$mdc->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
$mdc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$online = new PDO("mysql:host=localhost;dbname=mdc-online",$user,$pass);
$online->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
$online->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$from = $mdc->query("SELECT idnum, idext, lname, fname, mi
        FROM stud_info
        WHERE idnum IN (SELECT idnum FROM stud_enrol
            WHERE sem_code > 18)")->fetchAll();

$qry = $online->prepare("INSERT INTO students (id, idext, lname, fname, mname, created_at, updated_at)
        VALUES (:id, :idext, :lname, :fname, :mname, NOW(),NOW())");

foreach($from as $s) {
    $qry->execute([
        ':id' => $s->idnum,
        ':idext' => $s->idext,
        ':lname' => $s->lname,
        ':fname' => $s->fname,
        ':mname' => $s->mi,
    ]);
    echo "Inserted $s->idnum | $s->lname, $s->fname\n";
}
