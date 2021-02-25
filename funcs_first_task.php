<?php
include "config.php";

function getUniquePhone()
{
    $link = connectToDB();

    $query = "SELECT firms.Firms, phones.Phone FROM firms LEFT JOIN phones ON firms.ID=phones.FirmID GROUP BY firms.ID";

    $result = mysqli_query($link, $query);
    $res = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $res[] = $row;
    }
    return $res;
}

function getPhone()
{
    $link = connectToDB();

    $query = "SELECT firms.Firms, phones.Phone FROM firms LEFT JOIN phones ON firms.ID=phones.FirmID";

    $result = mysqli_query($link, $query);
    $res = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $res[] = $row;
    }

    return $res;
}

function phoneList()
{
    $list = getPhone();

    $firm_name = [];
    foreach ($list as $val) {
        if (!in_array($val['Firms'], $firm_name)) $firm_name[] = $val['Firms'];
    }
    $numb = count($firm_name);
    return $firm_name;
}

function countPhones(){
    $firm_list = phoneList();
    $count_phones = [];
    for($i=0; $i<count($firm_list); $i++){
        $count_phones[$firm_list[$i]] = 0;
    }
    $list = getPhone();
    foreach ($list as $firm){
        if(in_array($firm['Firms'],$firm_list)){
            if ($firm['Phone'] !=''){
                $count_phones[$firm['Firms']]++;
            }
        }
    }
    return $count_phones;
}

function connectToDB()
{
    $link = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if (mysqli_connect_errno()) {
        exit('Failed to connect to MySQL: ' . mysqli_connect_error());
    }

    return $link;
}