<?php

function Rupiah($Rp)
{
    $hasil = "Rp ".number_format($Rp, 0, ',', '.' );
    return $hasil;
}