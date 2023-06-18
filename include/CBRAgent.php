<?php

class CBRAgent
{
    protected $array = array();

    public function load(){
        $xml = new DOMDocument();
        $url = 'http://www.cbr.ru/scripts/XML_daily.asp?date_req=' . date('d.m.Y');

        if ($xml->load($url)){
            $this->array = [];

            $root = $xml->documentElement;
            $items = $root->getElementsByTagName('Valute');

            foreach ($items as $item) {
                $code = $item->getElementsByTagName('CharCode')->item(0)->nodeValue;
                $nominal = $item->getElementsByTagName('Nominal')->item(0)->nodeValue;
                $curs = ($item->getElementsByTagName('Value')->item(0)->nodeValue);
                $cursNom= floatval(str_replace(',', '.', $curs))/$nominal;
                $this->array[$code] = floatval(str_replace(',', '.', $cursNom));
            }
            return true;
        }
        return false;
    }

    public function get($cur){
        return $this->array[$cur] ?? 0;
    }
}