<?php
/** * Copyright 2013 Microsoft Corporation 
    *  
    * Licensed under the Apache License, Version 2.0 (the "License"); 
    * you may not use this file except in compliance with the License. 
    * You may obtain a copy of the License at 
    * http://www.apache.org/licenses/LICENSE-2.0 
    *  
    * Unless required by applicable law or agreed to in writing, software 
    * distributed under the License is distributed on an "AS IS" BASIS, 
    * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. 
    * See the License for the specific language governing permissions and 
    * limitations under the License. 
    */
    
function connect()
{
    // DB connection info
    $server = "tcp:vzwses3zoj.database.windows.net";
    $user = "evoting@vzwses3zoj";
    $pwd = "Salasona123";
    $db = "evoting";
    try{
        $conn = new PDO( "sqlsrv:Server= $server ; Database = $db ", $user, $pwd);
        $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    }
    catch(Exception $e){
        die(print_r($e));
    }
    return $conn;
}

function postVote($id,$fbid)
{   $conn = connect();
    $sql = "insert into votes(kellelt,kellele) values ('$fbid','$id');";
    $stmt = $conn->prepare($sql);
    //$stmt->bindValue(1, $id);
    $stmt->execute();
}
function getVotesAfter()
{
    $conn = connect();
    $sql = "select * from votes";
    $stmt = $conn->query($sql);
    return $stmt->fetchAll(PDO::FETCH_NUM);
}function getLastVote()
{
    $conn = connect();
    $sql = "select top 1 id from votes";
    $stmt = $conn->query($sql);
    return $stmt->fetchAll(PDO::FETCH_NUM);
}

function getVoteData($fbid)
{
    $conn = connect();
    $sql = "select eesnimi, perenimi, votedate
    from kandidaat, kasutaja, votes
    where kandidaat.fbid= kasutaja.fbid
    and kellele=kandidaat.id and kellelt='$fbid'";
    $stmt = $conn->query($sql);
    return $stmt->fetchAll(PDO::FETCH_NUM);
}
function delVote($id) {
    $conn = connect();
    $sql = "delete votes where kellelt='$id'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}
function delKandidaat($id) {
    $conn = connect();
    $sql = "delete from votes where kellele in
    (select id from kandidaat where fbid='$id');
    delete kandidaat where fbid='$id'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}
function getAllKandidaadid()
{
    $conn = connect();
    $sql = "SELECT kandidaat.id, kasutaja.eesnimi,
    kasutaja.perenimi, linn, partei FROM kandidaat,
    kasutaja WHERE kandidaat.fbid = kasutaja.fbid
    ORDER BY kandidaat.id";
    $stmt = $conn->query($sql);
    return $stmt->fetchAll(PDO::FETCH_NUM);
}

function getUser($id) {
    $conn = connect();
    $sql = "SELECT * FROM Kasutaja WHERE fbid = '$id'";
    $stmt = $conn->query($sql);
    //$stmt->bindValue(1, "'$id'");
    return $stmt->fetchAll(PDO::FETCH_NUM);
}
function addUser($id, $fname, $lname) {
    $conn = connect();
    $sql = "INSERT INTO Kasutaja (fbid, eesnimi, perenimi) VALUES
    ('$id', '$fname', '$lname')";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}
function addKandidaat($id, $linn, $partei, $info) {
    $conn = connect();
    $sql = "INSERT INTO Kandidaat (fbid, linn, partei, tekst) VALUES
    ('$id', '$linn', '$partei', '$info')";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}
function getKandidaat($id, $x) {
    $conn = connect();
    if ($x == 'fbid') {
        $sql = "SELECT * FROM Kandidaat WHERE fbid = '$id'";
    } else {
        $sql = "SELECT * FROM Kandidaat WHERE id = $id";
    }    
    $stmt = $conn->query($sql);
    return $stmt->fetchAll(PDO::FETCH_NUM);
}
function getAllPartys()
{
    $conn = connect();
    $sql = "SELECT * FROM tulem_partei ORDER BY Tulemus desc";
    $stmt = $conn->query($sql);
    return $stmt->fetchAll(PDO::FETCH_NUM);
}
function getAllScores()
{
    $conn = connect();
    $sql = "SELECT * FROM tulem_kandid ORDER BY Tulemus DESC";
    $stmt = $conn->query($sql);
    return $stmt->fetchAll(PDO::FETCH_NUM);
}

function addPeron($lastName, $firstName, $address, $city)
{
    $conn = connect();
    $sql = "INSERT INTO Persons (lastname, firstname, address, city) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(1, $lastName);
    $stmt->bindValue(2, $firstName);
    $stmt->bindValue(3, $address);
    $stmt->bindValue(4, $city);
    $stmt->execute();
}

function deleteItem($item_id)
{
    $conn = connect();
    $sql = "DELETE FROM items WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(1, $item_id);
    $stmt->execute();
}

?>